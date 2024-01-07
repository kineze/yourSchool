<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Clear existing records from the table
        TimeSlot::truncate();

        // Generate and insert slots
        $startTime = strtotime('08:00:00'); // 8:00 PM
        $endTime = strtotime('18:00:00');   // 11:00 PM
        $duration = 60; // Duration in minutes

        while ($startTime < $endTime) {
            TimeSlot::create([
                'name' => date('g:i A', $startTime), // Format time as 12-hour clock with AM/PM
                'start_time' => date('H:i:s', $startTime),
                'end_time' => date('H:i:s', $startTime + ($duration * 60)),
                'duration' => $duration,
            ]);

            $startTime += ($duration * 60); // Move to the next slot
        }
    }
}
