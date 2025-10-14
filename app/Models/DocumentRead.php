<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentRead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_id',
        'read_at',
        'duration',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
