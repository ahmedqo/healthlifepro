<?php

namespace App\Functions;

use App\Models\ProductViews;
use Illuminate\Support\Str;

class Core
{
    public static function lang($lang = null)
    {
        return $lang ? app()->getLocale() == $lang : app()->getLocale();
    }

    public static function route($str)
    {
        return Str::contains(request()->path(), 'admin/' . $str);
    }

    public static function slug($str)
    {
        return Str::slug($str);
    }

    public static function gender()
    {
        return ['male', 'female'];
    }

    public static function format($num)
    {
        $formattedNumber = number_format($num);
        if (strpos($formattedNumber, '.') === false) {
            $formattedNumber .= '.00';
        } else {
            list($integerPart, $decimalPart) = explode('.', $formattedNumber);
            if (strlen($decimalPart) === 1) {
                $formattedNumber .= '0';
            }
        }
        return $formattedNumber;
    }

    public static function views($product)
    {
        $Current = ProductViews::where('remote', request()->ip())->where('product', $product)->first();
        if ($Current) {
            $Current->update([
                'count' => $Current->count + 1
            ]);
        } else {
            ProductViews::create([
                'product' => $product,
                'remote' => request()->ip(),
            ]);
        }
    }
}
