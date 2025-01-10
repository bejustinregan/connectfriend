<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = ['Chef', 'Police', 'Doctor', 'Teacher', 'Fisherman', 'Nurse', 'Judge', 'Lawyer', 'Accountant', 'Scientist', 'Pilot'];

        foreach ($works as $work) {
            Work::create(['name' => $work]);
        }
    }
}
