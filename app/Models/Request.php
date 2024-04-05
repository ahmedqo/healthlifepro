<?php

namespace App\Models;

use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'email',
        'phone',
        'name',
    ];

    protected $searchable = [
        'message',
        'email',
        'phone',
        'name',
    ];

    protected static function booted()
    {
        self::created(function ($Self) {
            RequestItem::create([
                'request' => $Self->id,
                'product' => request('product'),
                'quantity' => request('quantity'),
            ]);
        });
    }

    public function Items()
    {
        return $this->hasMany(RequestItem::class, 'request');
    }

    public function Length()
    {
        return $this->Items->reduce(function ($carry, $item) {
            return $carry +  $item->quantity;
        }, 0);
    }
}
