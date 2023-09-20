<?php

namespace App\ECommerce\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = ['size' => 'array'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
