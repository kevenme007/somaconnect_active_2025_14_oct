<?php

namespace App\Models;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    public function forumThreads()
    {
        return $this->hasMany(ForumThread::class);
    }

     public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
