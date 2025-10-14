<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceInteraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resource_id',
        'interaction_type',
        'timestamp',
    ];

    public $timestamps = false; // since we're using `timestamp` manually

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
