<?php

namespace App\Models;

use App\Functions\Core;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Catalog extends Model
{
    use HasFactory, HasSearch;

    protected $fillable = [
        'document',
        'storage',
        'name_en',
        'name_fr',
        'name_ar',
    ];

    protected $searchable = [
        'name_en',
        'name_fr',
        'name_ar',
    ];

    public static $STORAGE_PATH = 'CATALOGS';

    protected static function Change($Self, $name, $field)
    {
        Storage::disk('public')->delete(implode('/', [Catalog::$STORAGE_PATH, $Self->{$name}]));
        $Self->{$name} = self::Upload($field);
    }

    protected static function Upload($name)
    {
        return basename(Storage::disk('public')->put(self::$STORAGE_PATH, request($name)));
    }

    protected static function booted()
    {
        self::creating(function ($Self) {
            $Self->storage = self::Upload('image');
            $Self->document = self::Upload('file');
        });

        self::deleted(function ($Self) {
            Storage::disk('public')->delete(implode('/', [Catalog::$STORAGE_PATH, $Self->storage]));
            Storage::disk('public')->delete(implode('/', [Catalog::$STORAGE_PATH, $Self->document]));
        });
    }


    public function getImageAttribute()
    {
        return Storage::url(implode('/', [Catalog::$STORAGE_PATH, $this->storage]));
    }

    public function getFileAttribute()
    {
        return Storage::url(implode('/', [Catalog::$STORAGE_PATH, $this->document]));
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }
}
