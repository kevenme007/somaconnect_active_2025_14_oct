<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'file_path',
        'image_path',
        'subject_id',
        'user_id',
        'resource_type',
        'resource_extension',
        'status',
        'approved_by',
        'approved_at',
        'grade_level',
        'downloads',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'grade_level' => 'integer',
    ];

    public function readingHistories()
    {
        return $this->hasMany(ReadingHistory::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function documentReads()
    {
        return $this->hasMany(DocumentRead::class, 'document_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
    
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }

    public function getStatusLabelAttribute()
    {
        return ucfirst($this->status);
    }

}
