<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            ['name' => 'header'],
            ['name' => 'footer'],
            ['name' => 'register'],
            ['name' => 'login'],
            ['name' => 'about_us']
        ];

        foreach ($places as $place)
        {
            Place::factory()->create($place);
        }
    }
}
