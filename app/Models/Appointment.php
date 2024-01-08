<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['title','consultant_id', 'student_id', 'date', 'timeslot_id'];

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }
}
