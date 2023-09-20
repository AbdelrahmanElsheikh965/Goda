<?php

namespace App\ECommerce\Client\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'gender', 'remember_token', 'email_verified_at'];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */
//    public function setPasswordAttribute($value) : void
//    {
//        $this->attributes['password'] = Hash::make($value);
//    }

}
