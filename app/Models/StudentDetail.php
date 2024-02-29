<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'student_nic',
        'gender',
        'blood_group',
        'previous_school',
        'orphan',
        'religion',
    ];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
