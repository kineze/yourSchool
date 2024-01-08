<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        // Save student image if provided
        if ($request->hasFile('stu-img')) {
            $imagePath = $request->file('stu-img')->store('student_images', 'public');
            $student->image_path = $imagePath;
        }

        $student->save();

        // Attach selected countries to the student
        if ($request->has('countries')) {
            $student->countries()->attach($request->input('countries'));
        }

        $notification = [
            'message' => 'Student added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('student', $student->id)->with($notification,'success', 'Student created successfully!');
    }

    public function student($id){

        $user = Auth::user();
        
        $student = Student::findOrFail($id);

        return view('admin.student', compact('user', 'student'));
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

        return redirect()->back()->with($notification);
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

}
