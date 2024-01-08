<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'age',
        'course_category',
        'consultant_id',
        'highest_qualification',
        'image_path',
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultant()
    {
        return $this->belongsTo(User::class);
    }

    public function appointment()
    {
        return $this->hasMany(appointment::class);
    }
    
}
