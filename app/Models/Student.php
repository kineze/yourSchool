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
        'highest_qualification',
        'image_path',
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class)->withTimestamps();
    }
    
}
