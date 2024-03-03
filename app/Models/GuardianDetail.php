<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'guardian_role',
        'guardian_name',
        'profession',
        'phone_number',
        'guardian_nic',
        'whatsapp_number',
    ];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
