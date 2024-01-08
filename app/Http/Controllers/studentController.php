<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Student;
use App\Models\TimeSlot;
use NotifyLk\Api\SmsApi;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentAssigned;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class studentController extends Controller
{
    public function newStudent(){

        $user = Auth::user();

        $countries = Country::get();

        return view('admin.newStudent', compact('user','countries'));
    }

    public function students(){

        $user = Auth::user();

        $students = Student::get();

        return view('admin.students', compact('user','students'));
    }


    public function storeStudent(Request $request)
    {
        $request->validate([
            'UserName' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20|unique:students,phone',
            'address' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'countries' => 'nullable|array',
            'countries.*' => 'exists:countries,id',
            'stu-img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Calculate age based on the birth date
        $birthDate = Carbon::parse($request->input('birth_date'));
        $age = Carbon::now()->diffInYears($birthDate);

        // Store student information
        $student = new Student([
            'name' => $request->input('UserName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'birth_date' => $birthDate,
            'age' => $age,
            // Add any other fields you want to save
        ]);

        $student->save();

        // Save student image if provided
        if ($request->hasFile('stu-img')) {
            $imagePath = $request->file('stu-img')->store('student_images', 'public');
            $student->image_path = $imagePath;
        }

        // Attach selected countries to the student
        if ($request->has('countries')) {
            $student->countries()->attach($request->input('countries'));
        }

        $this->sendSms($student);

        $notification = [
            'message' => 'Student added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('student', $student->id)->with($notification,'success', 'Student created successfully!');
    }

    private function sendSms(Student $student)
    {
        $user_id = "26373";
        $api_key = "SjAR7q9dPPuR8Ecb2uzm";
        $message = "Welcome to Skygate International, " . $student->name . ". We turn your dreams into reality. Together, let's build a successful future for you. Thank you for registering!";
        $to = $student->phone;
        $sender_id = "NotifyDEMO"; // Replace with your sender ID

        $api_url = "https://app.notify.lk/api/v1/send";

        try {
            $response = Http::get($api_url, [
                'user_id' => $user_id,
                'api_key' => $api_key,
                'message' => $message,
                'to' => $to,
                'sender_id' => $sender_id,
            ]);

            // Log the response
            $logMessage = "Notify.lk SMS Response for student {$student->id}: " . json_encode($response->json());
            \Illuminate\Support\Facades\Log::info($logMessage);

            // Check if the SMS was sent successfully
            if ($response->successful()) {
                // SMS sent successfully
                // You may log this or perform additional actions
            } else {
                // SMS sending failed
                // You may log this or handle errors
                // $response->status(), $response->body(), etc.
            }
        } catch (\Exception $e) {
            // Log any exceptions that might occur during the HTTP request
            \Illuminate\Support\Facades\Log::error('Exception during Notify.lk SMS request: ' . $e->getMessage());
        }
    }





    public function student($id){

        $user = Auth::user();
        
        $student = Student::findOrFail($id);

        $consultants = User::role('Consultant')->get();

        $timeSlots = TimeSlot::get();

        $appointments = $student->appointment;

        return view('admin.student', compact('user', 'student', 'consultants', 'timeSlots', 'appointments'));
    }

    public function searchStudents(Request $request)
    {
        $query = $request->input('query');

        $results = Student::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%')
            ->get();

            return response()->json(['results' => $results]);
    }

    public function editStudent($id){

        $user = Auth::user();

        $student = Student::findOrFail($id);

        $countries = Country::get();

        return view('admin.editStudent', compact('user', 'student', 'countries'));

    }

    public function deleteStudent($id){

        $student = Student::findOrFail($id);

        $student->delete();

        $notification = [
            'message' => 'Student deleted successfully',
            'alert-type' => 'error',
        ];

        return redirect()->route('students')->with($notification);
    }

    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'UserName' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'countries' => 'nullable|array',
            'countries.*' => 'exists:countries,id',
            'stu-img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = Student::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('stu-img')) {
            if ($student->image_path) {
                Storage::delete($student->image_path);
            }

            // Store the new image
            $path = $request->file('stu-img')->store('student_images', 'public');
            $student->image_path = $path;
        }

        // Update other fields
        $student->name = $request->input('UserName');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->birth_date = $request->input('birth_date');
        // Update other fields as needed

        // Save the changes
        $student->save();

        // Update the desired countries relationship
        $student->countries()->sync($request->input('countries', []));

        $notification = [
            'message' => 'Student Updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification,'success', 'Student updated successfully!');
    }

    public function assignConsultant(Request $request, $studentId)
    {
        $request->validate([
            'consultant' => 'nullable|exists:users,id',
            'new-appoinment' => 'nullable|boolean',
            'title' => 'nullable|string',
            'date' => 'nullable|date',
            'timeslot' => 'nullable|exists:time_slots,id',
        ]);

        // Get the student by ID or create a new one
        $student = Student::findOrFail($studentId);

        // Update the student's consultant ID
        $student->update([
            'consultant_id' => $request->input('consultant'),
        ]);

        // Check if a new appointment is requested
        if ($request->input('new-appoinment')) {
            // Create a new appointment using Eloquent
            $appointment = new Appointment([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'timeslot_id' => $request->input('timeslot'),
            ]);

            // Associate the appointment with the student and consultant
            $appointment->student()->associate($student);
            $appointment->consultant()->associate($request->input('consultant'));
            $appointment->save();

            $this->sendAppointmentSms($student, $appointment);

            Mail::to($student->consultant->email)->send(new AppointmentAssigned($student, $appointment));
        }

        

        $notification = [
            'message' => 'Consultant Assigned successfully',
            'alert-type' => 'success',
        ];
        

        return redirect()->back()->with($notification,'success', 'Form submitted successfully.');
    }

    private function sendAppointmentSms(Student $student, Appointment $appointment)
    {
        $user_id = "26373";
        $api_key = "SjAR7q9dPPuR8Ecb2uzm";
        $message = "Welcome to Skygate International, {$student->name}. Your appointment details: 
        Title: {$appointment->title},
        Date: {$appointment->date},
        Start time: {$appointment->timeslot->start_time}. 
        thank you!";
        $to = $student->phone;
        $sender_id = "NotifyDEMO"; // Replace with your sender ID

        $api_url = "https://app.notify.lk/api/v1/send";

        try {
            $response = Http::get($api_url, [
                'user_id' => $user_id,
                'api_key' => $api_key,
                'message' => $message,
                'to' => $to,
                'sender_id' => $sender_id,
            ]);

            // Log the response
            $logMessage = "Notify.lk SMS Response for student {$student->id}: " . json_encode($response->json());
            \Illuminate\Support\Facades\Log::info($logMessage);

            // Check if the SMS was sent successfully
            if ($response->successful()) {
                // SMS sent successfully
                // You may log this or perform additional actions
            } else {
                // SMS sending failed
                // You may log this or handle errors
                // $response->status(), $response->body(), etc.
            }
        } catch (\Exception $e) {
            // Log any exceptions that might occur during the HTTP request
            \Illuminate\Support\Facades\Log::error('Exception during Notify.lk SMS request: ' . $e->getMessage());
        }
    }





}
