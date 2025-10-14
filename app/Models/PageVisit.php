<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'page_url',
        'visited_at',
    ];

    // Optional: Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
