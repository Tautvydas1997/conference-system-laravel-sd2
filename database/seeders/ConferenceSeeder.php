<?php

namespace Database\Seeders;

use App\Models\Conference;
use Illuminate\Database\Seeder;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conference::create([
            'name' => 'PHP Developer Conference 2024',
            'description' => 'Metinė PHP programuotojų konferencija',
            'lecturers' => 'Jonas Jonaitis, Petras Petraitis',
            'date' => '2024-12-15',
            'time' => '10:00',
            'address' => 'Vilnius, Konferencijų centras, Gedimino pr. 1',
            'status' => 'planned',
        ]);

        Conference::create([
            'name' => 'Web Technologies Summit',
            'description' => 'Šiuolaikinių web technologijų konferencija',
            'lecturers' => 'Marija Marijaitė, Tomas Tomaitis',
            'date' => '2024-11-20',
            'time' => '14:00',
            'address' => 'Kaunas, Tech Hub, Laisvės al. 55',
            'status' => 'completed',
        ]);

        Conference::create([
            'name' => 'Laravel Framework Workshop',
            'description' => 'Praktinis Laravel framework mokymasis',
            'lecturers' => 'Andrius Andriukaitis',
            'date' => '2025-01-10',
            'time' => '09:00',
            'address' => 'Vilnius, Code Academy, Vokiečių g. 5',
            'status' => 'planned',
        ]);
    }
}
