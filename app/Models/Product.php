<?php

namespace App\Models;

use App\Models\Traits\UploadFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory, UploadFiles;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'welcome_message',
        'about_product',
        'full_description',
        'additional_descriotion',
        'benefits',
        'common_questions',
        'include_join_group_info',
        'include_charge_recurring_next_month_info'
    ];

    protected $appends = ['category'];

    protected $casts = [
        'full_description' => 'array',
        'additional_descriotion' => 'array',
        'benefits' => 'array',
        'common_questions' => 'array'
    ];

    public static function categories()
    { 
        return [
            0 => 'Other',
            1 => 'Welfare',
            2 => 'investmens',
            3 => 'Education',
            4 => 'languages',
            5 => 'Literature',
            6 => 'Entertainment',
            7 => 'Personal growth',
            8 => 'Cuisine and Gastronomy'
        ];
    }

    public function getCategoryAttribute()
    {
        return self::categories()[$this->category_id];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
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
