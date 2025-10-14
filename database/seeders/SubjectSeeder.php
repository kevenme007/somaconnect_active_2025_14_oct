<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //CONTROL SEEDERS DUPLICATES
        $seederName = static::class;
        $alreadySeeded = DB::table('seeder_logs')->where('seeder_name', $seederName)->exists();
        if ($alreadySeeded) {
            $this->command->info("$seederName already run. Skipping.");
            return;
        }

        DB::table('seeder_logs')->insert([
            'seeder_name' => $seederName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $subjects = [
            'Mathematics',
            'English',
            'Kiswahili',
            'Biology',
            'Physics',
            'Chemistry',
            'Geography',
            'History',
            'Civics',
            'Commerce',
            'Bookkeeping',
            'Computer Studies',
            'Literature',
            'Religion',
            'General Studies',
            'Agriculture',
            'French',
            'Arabic',
            'Economics',
            'Entrepreneurship',
            'Arts',
            'Fashion & Style'
        ];

        foreach ($subjects as $name) {
            DB::table('subjects')->insert([
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
