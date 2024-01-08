<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentAssigned;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();

        return response()->json($appointments);
    }

    public function deleteAppointment($id){

        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        $notification = array(
            'message' => 'Appointmewnt deleted successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification,'success', 'Appointmewnt deleted successfully');
    }

    public function createAppointment(Request $request, $studentId)
    {

        $student = Student::findOrFail($studentId);
        // Validate the request data
        $request->validate([
            'consultant' => 'required',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'timeslot' => 'required',
        ]);

        // Create a new appointment
        $appointment = new Appointment();
        $appointment->consultant_id = $request->input('consultant');
        $appointment->student_id = $studentId;
        $appointment->title = $request->input('title');
        $appointment->date = $request->input('date');
        $appointment->timeslot_id = $request->input('timeslot');
        // You can add other fields as needed

        // Save the appointment
        $appointment->save();

        $this->sendAppointmentSms($student, $appointment);

            Mail::to($student->consultant->email)->send(new AppointmentAssigned($student, $appointment));

        // Optionally, you can return a response
        $notification = array(
            'message' => 'Appointmewnt created successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification,'success', 'Appointment created successfully');
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
