<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenAI\Enums\Moderations\Category;

class ForumThread extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'school_id', 'title', 'body'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(ForumPost::class, 'thread_id');
    }
}
