<?php

namespace App\ECommerce\Shared\Helpers;

use App\ECommerce\Product\Models\Product;
use App\Models\Place;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Helper
{
    public $slidesNames = [];
    private static $instance;

    public static function getInstance()
    {
        // Applying singleton design pattern.
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function save($image) 
    {
        $response = Http::withHeaders([
            'authorization' => 'Client-ID ' . env('CLIENT_ID'),
            'content-type' => 'application/x-www-form-urlencoded',
        ])->send('POST', 'https://api.imgur.com/3/image', [
            'form_params' => [
                    'image' => base64_encode(file_get_contents($image))
                ],
            ]);
        $responseLink = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');

        return $responseLink;

    }

    public function getSlidesNames($arrayImages)
    {
        foreach ($arrayImages as $slide) {
            $this->slidesNames[] = self::save($slide);
        }
        return $this;
    }

    public function handleSlidesImagesWithDB(Product $product)
    {
        foreach ($this->slidesNames as $oneSlide) {
            $product->images()->updateOrCreate(['image'  => $oneSlide]);
        }
        return true;
    }

    public static function load(string $table, array $columns, string $idColumn, int $id, bool $count = false)
    {
        $data = DB::table($table)->select($columns)
            ->where($idColumn, '=', $id)->get();
        echo ($count === true)
            ? json_encode(['data' => $data, "num" => count($data)])
            : json_encode(['data' => $data]);
    }

    public static function getIdOfPlaceByName($name)
    {
        return Place::where('name', $name)->pluck('id')[0];
    }
}
