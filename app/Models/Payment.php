<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan',
        'price',
        'monthly',
        'days',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function boot()
    {
        parent::boot();

        // self::creating(function (Model $model) {
        //     $model->customer_id = auth()->user()->id;
        // });

        // self::updating(function (Model $model) {
        //     $model->customer_id = auth()->user()->id;
        // });

        self::saving(function (Model $model) {
            $model->customer_id = auth()->user()->id;
        });
    }
}
