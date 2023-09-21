<?php

namespace App\Models;

use App\ECommerce\Client\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'total_price', 'state'];

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public function products()
    {
        return $this->belongsToMany('App\ECommerce\Product\Models\Product')
            ->withPivot(['quantity', 'product_total_price']);
    }

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
