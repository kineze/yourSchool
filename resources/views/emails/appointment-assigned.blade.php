<p>Appointment Alert</p>

<p>You have an appointment with {{ $student->name }},  appointment details are as follows:</p>

<ul>
    <li><strong>Student Name:</strong> {{ $student->name }}</li>
    <li><strong>Title:</strong> {{ $appointment->title }}</li>
    <li><strong>Date:</strong> {{ $appointment->date }}</li>
    <li><strong>Time Slot:</strong> {{ $appointment->timeslot->name }}</li>
</ul>

<p>Thank you</p>