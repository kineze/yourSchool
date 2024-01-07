<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{

    public function getAdminDashboard(){

        $user = Auth::user();

        return view('admin.Dashboard', compact('user'));
    }

    public function getTimeSlots(){

        $user = Auth::user();

        $timeSlots = TimeSlot::get();
        
        return view('admin.timeSlots', compact('user', 'timeSlots'));

    }

    public function newTimeSlot(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s', 
        ]);

      
        $startTime = Carbon::parse($data['start_time']);
        $endTime = Carbon::parse($data['end_time']);

      
        $durationInMinutes = $endTime->diffInMinutes($startTime);

        
        $data['duration'] = $durationInMinutes;

        TimeSlot::create($data);

        $notification = array(
            'message' => 'Time slot added successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification,'success', 'Time slot added successfully');
    }


    public function updateTimeSlot(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
        ]);

        try {
            // Find the time slot by ID
            $timeSlot = TimeSlot::findOrFail($id);

            // Update the time slot with the validated data
            $timeSlot->name = $validatedData['name'];
            $timeSlot->start_time = $validatedData['start_time'];
            $timeSlot->end_time = $validatedData['end_time'];

            // Save the changes to the database
            $timeSlot->save();

            $notification = array(
                'message' => 'Time slot updated successfully',
                'alert-type' => 'success'
            );

            // Redirect back with a success message
            return redirect()->back()->with($notification, 'success', 'Time slot updated successfully');


        } catch (\Exception $e) {

            $notification = array(
                'message' => 'error', 'An error occurred while updating the time slot',
                'alert-type' => 'error'
            );
            // Handle any exceptions that may occur (e.g., database errors)
            return redirect()->back()->with($notification, 'error', 'An error occurred while updating the time slot');
        }
    }



    public function destroytimeSlot($id)
    {
        try {
            // Find the time slot by ID
            $timeSlot = TimeSlot::findOrFail($id);

            // Delete the time slot
            $timeSlot->delete();

            $notification = array(
                'message' => 'Time slot deleted successfully',
                'alert-type' => 'success'
            );

            // Redirect back with a success message
            return redirect()->back()->with($notification,'success', 'Time slot deleted successfully');
        } catch (\Exception $e) {

            $notification = array(
                'message' => 'error', 'An error occurred while deleting the time slot',
                'alert-type' => 'error',
                'exception_message' => $e->getMessage(),
            );

            // Handle any exceptions that may occur (e.g., database errors)
            return redirect()->back()->with($notification,'error', 'An error occurred while deleting the time slot');
        }
    }

}
