<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained()->onDelete('cascade'); 
           $table->foreignId('user_id')->constrained()->onDelete('cascade');        
            $table->string('title');
            $table->text('body'); // Rich text (can include HTML)
            $table->enum('type', ['note', 'video', 'quiz'])->default('note');
            $table->string('video_url')->nullable(); // For video content
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
