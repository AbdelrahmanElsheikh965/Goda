<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function paragraphs()
    {
        return $this->hasMany('App\ECommerce\Static\Models\Paragraph');
    }
    public function webImages()
    {
        return $this->hasMany('App\ECommerce\Static\Models\WebImage');
    }
}
