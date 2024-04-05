<?php

namespace App\Models;

use App\Functions\Core;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'slug',
        'name_en',
        'name_fr',
        'name_ar',
        'storage',
        'description_en',
        'description_fr',
        'description_ar',
    ];

    protected $searchable = [
        'name_en',
        'name_fr',
        'name_ar',
        'description_en',
        'description_fr',
        'description_ar',
    ];

    public static $STORAGE_PATH = 'CATEGORIES';

    protected static function Change($Self)
    {
        Storage::disk('public')->delete(implode('/', [Category::$STORAGE_PATH, $Self->storage]));
        $Self->storage = self::Upload('image');
    }

    protected static function Upload($name)
    {
        return basename(Storage::disk('public')->put(self::$STORAGE_PATH, request($name)));
    }

    protected static function booted()
    {
        self::creating(function ($Self) {
            $Self->storage = self::Upload('image');
        });

        self::deleted(function ($Self) {
            Storage::disk('public')->delete(implode('/', [Category::$STORAGE_PATH, $Self->storage]));
        });
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function Categories()
    {
        return $this->hasMany(Category::class, 'category');
    }

    public function Products()
    {
        return $this->hasMany(Product::class, 'category');
    }

    public function getImageAttribute()
    {
        return Storage::url(implode('/', [Category::$STORAGE_PATH, $this->storage]));
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . Core::lang()};
    }
}
