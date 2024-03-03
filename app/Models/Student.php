<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'birth_date', 'admission_date',
        'medium', 'admission_id', 'age', 'user_id', 'class_id', 'location_id', 'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with SchoolClass model
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function studentDetail()
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function guardianDetail()
    {
        return $this->hasOne(GuardianDetail::class);
    }
    
}
