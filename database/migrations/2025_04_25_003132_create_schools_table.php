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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('headteacher_name');
            $table->string('street');
            $table->string('registration_number');
            $table->string('type')->nullable(); // e.g., 'Primary', 'Secondary', Both etc.
            $table->string('description')->nullable();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('district_id');

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
