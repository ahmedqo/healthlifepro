<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductViews;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Request as _Request;
use Carbon\Carbon;

class CoreController extends Controller
{
    public function index_view()
    {
        $startDate = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $endDate = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        $days = [];
        $days[ucwords(__('sunday'))] = 0;
        $days[ucwords(__('monday'))] = 0;
        $days[ucwords(__('tuesday'))] = 0;
        $days[ucwords(__('wednesday'))] = 0;
        $days[ucwords(__('thursday'))] = 0;
        $days[ucwords(__('friday'))] = 0;
        $days[ucwords(__('saturday'))] = 0;

        $products = Product::all()->count();
        $requests = _Request::whereBetween('created_at', [$startDate, $endDate])->get()->count();
        $quotations = Quotation::whereBetween('created_at', [$startDate, $endDate])->get()->count();

        $total = Quotation::whereBetween('created_at', [$startDate, $endDate])->get()->reduce(function ($carry, $quote) {
            return $carry + ($quote->Total() + $quote->Charges());
        }, 0);

        Quotation::whereBetween('created_at', [$startDate, $endDate])->get()
            ->groupBy(function ($quotation) {
                return $quotation->created_at->format('l');
            })
            ->map(function ($group) {
                return $group->sum(function ($quote) {
                    return $quote->Total() + $quote->Charges();
                });
            })->each(function ($item, $key) use (&$days) {
                $it = ucwords(__(strtolower($key)));
                $days[$it] = $item;
            });


        $views = ProductViews::with('Product')->whereBetween('updated_at', [$startDate, $endDate])->get()
            ->groupBy('product')->map(function ($group) {
                $group->views = $group->count();
                $group->Product = $group->first()->Product;
                return $group;
            })->take(10);

        $days = json_encode($days);

        $sells = QuotationItem::with('Product')->whereBetween('created_at', [$startDate, $endDate])->get()
            ->groupBy('product')->map(function ($group) {
                $group->sells = $group->reduce(function ($carry, $item) {
                    return $carry + $item->quantity;
                }, 0);
                $group->Product = $group->first()->Product;
                return $group;
            })->take(10);

        return view('core.index', compact('products', 'quotations', 'requests', 'total', 'views', 'days', 'sells'));
    }
}
