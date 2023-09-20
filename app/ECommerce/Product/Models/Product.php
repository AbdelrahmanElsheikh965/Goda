<?php

namespace App\ECommerce\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['size' => 'array'];

    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
