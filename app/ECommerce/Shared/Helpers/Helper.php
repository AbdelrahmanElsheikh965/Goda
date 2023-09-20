<?php

namespace App\ECommerce\Shared\Helpers;

use App\ECommerce\Product\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class Helper
{
    public $slidesNames = [];
    private static $instance;

    public static function getInstance()
    {
        // Applying singleton design pattern to reduce memory usage during live production.
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function save($image)
    {
        if (! is_null($image) )
            $image->move(storage_path('app/public/images'), $image->getClientOriginalName());
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

}

