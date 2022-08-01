<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


trait PhoneVerification
{

    // public static function boot()
    // {
    //     parent::boot();

    //     self::creating(function (Model $model) {
    //         $model->verification_code = rand(pow(10, 6 -1), pow(10, 6)-1);
    //     });
    // }

    public function updatingCode()
    {
        $this->forceFill([
            'verification_code' => rand(pow(10, 6 -1), pow(10, 6)-1)
        ]);

        return $this->save();
    }

    // public static function isUniquePhone(string $phone)
    // {
    //     return !self::query()->where("phone", Str::phoneNumber($phone))->where("phone_verified", true)->count();
    // }


    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_verified_at);
    }


    public function setVerifiedPhone()
    {
        $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ]);

        return $this->save();
    }
}