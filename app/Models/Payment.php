<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'client_id', 'currency', 'source_stripe_token'];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
