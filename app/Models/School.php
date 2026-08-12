<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

      protected $fillable = [
         'name',
        'headteacher_name',
        'street',
        'registration_number',
        'type',
        'description',
        'region_id',
        'district_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}

