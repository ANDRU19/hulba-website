<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBussinessDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'address',
        'neighborhood',
        'number',
        'add_on',
        'city',
        'state',
        'fullname',
        'description',
        'bank',
        'agency',
        'account',
        'account_type'
    ];


    public static function boot()
    {
        parent::boot();

        self::saving(function (Model $model) {
            $model->customer_id = auth()->user()->id;
        });
    }
}
