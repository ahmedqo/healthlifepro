<?php

namespace App\Models;

use App\Functions\Core;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Brand extends Model
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

    public static $STORAGE_PATH = 'BRANDS';

    protected static function Change($Self)
    {
        Storage::disk('public')->delete(implode('/', [Brand::$STORAGE_PATH, $Self->storage]));
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
            Storage::disk('public')->delete(implode('/', [Brand::$STORAGE_PATH, $Self->storage]));
        });
    }

    public function Products()
    {
        return $this->hasMany(Brand::class, 'brand');
    }

    public function getImageAttribute()
    {
        return Storage::url(implode('/', [Brand::$STORAGE_PATH, $this->storage]));
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
