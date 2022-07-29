<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\PhoneVerification;

class Customer extends Authenticatable
{
    use HasFactory, PhoneVerification;

    protected $fillable = [
        'fullname',
        'phone',
        'verification_code',
        'phone_verified_at',
        'email',
        'photo',
        'social',
        'settings',
        'description'
    ];

    protected $casts = [
        'phone_verified_at' => 'datetime'
       ];

       
}
