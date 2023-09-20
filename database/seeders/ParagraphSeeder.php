<?php

namespace Database\Seeders;

use App\ECommerce\Shared\Helpers\Helper;
use App\ECommerce\Static\Models\Paragraph;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParagraphSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paragraphs = [
        // For Header 3 Paragraphs
        [ 'title'=> 'Edit your header #1 title', 'body'=> 'Edit your header #1 body', 'place_id' => Helper::getIdOfPlaceByName('header')],
        [ 'title'=> 'Edit your header #2 title', 'body'=> 'Edit your header #2 body', 'place_id' => Helper::getIdOfPlaceByName('header')],
        [ 'title'=> 'Edit your header #3 title', 'body'=> 'Edit your header #3 body', 'place_id' => Helper::getIdOfPlaceByName('header')],
        // For Footer 3 Paragraphs
        [ 'title'=> 'Edit your Footer #1 title', 'body'=> 'Edit your Footer #1 body', 'place_id' => Helper::getIdOfPlaceByName('footer')],
        // For About Us 1 paragraph
        [ 'title'=> 'Edit your About_Us title', 'body'=> 'Edit your About_Us body', 'place_id'   => Helper::getIdOfPlaceByName('about_us')]
        ];

        foreach ($paragraphs as $paragraph)
        {
            Paragraph::factory()->create($paragraph);
        }
    }
}
