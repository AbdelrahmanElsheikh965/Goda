<?php

namespace App\ECommerce\Client\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'gender'];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value) : void
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
