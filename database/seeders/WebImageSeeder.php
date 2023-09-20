<?php

namespace Database\Seeders;

use App\ECommerce\Shared\Helpers\Helper;
use App\ECommerce\Static\Models\WebImage;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $webImages = [
            [ 'image'=> 'sample-image.jpg', 'place_id' => Helper::getIdOfPlaceByName('header')],
            [ 'image'=> 'sample-image.jpg', 'place_id' => Helper::getIdOfPlaceByName('header')],
            [ 'image'=> 'sample-image.jpg', 'place_id' => Helper::getIdOfPlaceByName('header')],
            [ 'image'=> 'sample-image.jpg', 'place_id' => Helper::getIdOfPlaceByName('about_us')]
        ];

        foreach ($webImages as $webImage)
        {
            WebImage::factory()->create($webImage);
        }
    }
}
