<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = "products_images";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product',
        'storage',
        'origin',
        'size',
    ];

    public static $STORAGE_PATH = 'PRODUCTS';

    protected static function Upload($file, $product)
    {
        $basename = basename(Storage::disk('public')->put(self::$STORAGE_PATH, $file));
        ProductImage::create([
            'product' => $product,
            'storage' => $basename,
            'origin' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
        ]);
    }

    protected static function booted()
    {
        self::deleted(function ($Self) {
            Storage::disk('public')->delete(implode('/', [ProductImage::$STORAGE_PATH, $Self->storage]));
        });
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product');
    }

    public function getUrlAttribute()
    {
        return Storage::url(implode('/', [ProductImage::$STORAGE_PATH, $this->storage]));
    }
}
