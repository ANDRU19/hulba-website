<?php

namespace App\Models;

use App\Models\Traits\UploadFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, UploadFiles;

    protected $fillable = [
        'title',
        'category_id',
        'description'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
