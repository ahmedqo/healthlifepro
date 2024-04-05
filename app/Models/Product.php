<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSearch;
use App\Functions\Core;

class Product extends Model
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'brand',
        'reference',
        'slug',
        'name_en',
        'name_fr',
        'name_ar',
        'price',
        'details_en',
        'details_fr',
        'details_ar',
        'description_en',
        'description_fr',
        'description_ar',
    ];

    protected $searchable = [
        'name_en',
        'name_fr',
        'name_ar',

        'details_en',
        'details_fr',
        'details_ar',

        'description_en',
        'description_fr',
        'description_ar',

        'brand.name_en',
        'brand.name_fr',
        'brand.name_ar',

        'category.name_en',
        'category.name_fr',
        'category.name_ar',
    ];

    protected static function booted()
    {
        self::created(function ($Self) {
            foreach (request('images') as $file) {
                ProductImage::Upload($file, $Self->id);
            }
        });
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function Images()
    {
        return $this->hasMany(ProductImage::class, 'product');
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }

    public function getDetailsAttribute()
    {
        return $this->{'details_' . Core::lang()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . Core::lang()};
    }
}
