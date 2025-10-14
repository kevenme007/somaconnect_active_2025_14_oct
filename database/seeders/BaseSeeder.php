<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seederName = static::class;

        $alreadySeeded = DB::table('seeder_logs')
            ->where('seeder_name', $seederName)
            ->exists();

        if ($alreadySeeded) {
            $this->command->info("$seederName already run. Skipping.");
            return;
        }


        // Log this seeder
        DB::table('seeder_logs')->insert([
            'seeder_name' => $seederName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info("$seederName has run and logged.");
    }

    }
