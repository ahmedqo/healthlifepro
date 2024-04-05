<?php

namespace App\Models;

use App\Functions\Core;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'request',
        'name',
        'email',
        'phone',
        'reference',
        'charges',
        'currency',
        'note_en',
        'note_fr',
        'note_ar',
    ];

    protected $searchable = [
        'request',
        'name',
        'email',
        'phone',
        'reference',
        'charges',
        'currency',
        'note_en',
        'note_fr',
        'note_ar',
    ];

    protected static function booted()
    {
        self::created(function ($Self) {
            foreach (request('products') as $key => $value) {
                QuotationItem::create([
                    'quotation' => $Self->id,
                    'quantity' => request('quantities')[$key],
                    'product' => request('products')[$key],
                    'price' => request('prices')[$key],
                ]);
            }
        });
    }

    public function Request()
    {
        return $this->belongsTo(Request::class, 'request');
    }

    public function Items()
    {
        return $this->hasMany(QuotationItem::class, 'quotation');
    }

    public function Total()
    {
        return $this->Items->reduce(function ($carry, $item) {
            return $carry + ($item->price * $item->quantity);
        }, 0);
    }

    public function Length()
    {
        return $this->Items->reduce(function ($carry, $item) {
            return $carry +  $item->quantity;
        }, 0);
    }

    public function Charges()
    {
        return $this->Total() * ($this->charges / 100);
    }

    public function getNoteAttribute()
    {
        return $this->{'note_' . Core::lang()};
    }
}
