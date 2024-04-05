<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $table = "quotations_items";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quotation',
        'quantity',
        'product',
        'price',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product');
    }

    public function Quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation');
    }
}
