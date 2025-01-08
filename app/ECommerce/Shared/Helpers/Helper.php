<?php

namespace App\ECommerce\Shared\Helpers;

use App\ECommerce\Product\Models\Product;
use App\Models\Place;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Helper
{
    public $slidesNames = [];
    private static $instance;

    public static function getInstance()
    {
        // Applying singleton design pattern.
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function save($image, $path = '/images')  // 'app/public/images' => is the default path.
    {
        if (! is_null($image) )
        {
            if (!File::isDirectory(public_path($path)))
            {
                File::makeDirectory(public_path($path), 0777, true);
                $image->move(public_path($path), $image->getClientOriginalName());
            }else
            {
                $image->move(public_path($path), $image->getClientOriginalName());
            }
        }
    }

    public function getSlidesNames($arrayImages)
    {
        foreach ($arrayImages as $slide)
        {
            $this->slidesNames [] = $slide->getClientOriginalName();
            self::save($slide);
        }
        return $this;
    }

    public function handleSlidesImagesWithDB(Product $product)
    {
        foreach ($this->slidesNames as $oneSlide)
        {
            $product->images()->updateOrCreate([ 'image'  => $oneSlide ]);
        }
        return true;
    }

    public static function load(string $table, array $columns, string $idColumn, int $id, bool $count = false)
    {
        $data = DB::table($table)->select($columns)
            ->where($idColumn , '=', $id)->get();
        echo ($count === true)
            ? json_encode([ 'data' => $data, "num" => count($data)])
            : json_encode([ 'data' => $data ]);
    }

    public static function getIdOfPlaceByName($name)
    {
        return Place::where('name', $name)->pluck('id')[0];
    }

}

