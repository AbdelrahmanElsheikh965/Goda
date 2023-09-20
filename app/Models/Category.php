<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('App\ECommerce\Product\Models\Product');
    }

    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }

    public static function getAll()
    {
        return Category::all();
    }
}
