<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grade_level',
        'bio',
        'avatar',
        'phone',
        'gender',
        'classroom',
        'teacher_subjects',
        'birthdate',
        'school_id',
        'region_id',
        'district_id',
        'guardian_name'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

     public function school()
    {
        return $this->belongsTo(School::class);
    }
}
