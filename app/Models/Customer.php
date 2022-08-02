<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\PhoneVerification;

class Customer extends Authenticatable
{
    use HasFactory, PhoneVerification;

    protected $fillable = [
        'name',
        'surname',
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
        'phone_verified_at' => 'datetime',
        'social' => 'array'
       ];

    protected $social = [
        'instagram' => '',
        'faceboock' => ''
    ];

    public function getSocialAttribute()
    {
        if($this->attributes['social']){
            $social = json_decode($this->attributes['social'], true);
            return array_merge($this->social,$social);
        }
        return $this->social;
    }

       
}
