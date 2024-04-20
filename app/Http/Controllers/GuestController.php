<?php

namespace App\Http\Controllers;

use App\Functions\{
    Mail as Mailer,
    Core
};
use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class GuestController extends Controller
{
    public function home_view()
    {
        $brands = Brand::limit(20)->get();
        $products = Product::with('Images')->limit(20)->latest()->get();
        $collection = collect();

        foreach (Category::inRandomOrder()->take(3)->get() as $category) {
            $collection->push([
                'category' => $category,
                'products' => Product::where('category', $category->id)
                    ->inRandomOrder()
                    ->take(8)
                    ->get(),
            ]);
        }

        return view('guest.home', compact('collection', 'brands', 'products'));
    }

    public function details_view(Request $Request, $slug)
    {
        $data = Product::with('Images')->where('slug', $slug)->first();
        if (!$data) abort(404);

        Core::views($data->id);

        $row = [
            [__('Home'), route('views.guest.home')],
            [__("Products"), route('views.guest.products')],
            [ucwords($data->name), route('views.guest.details', $data->slug)]
        ];

        return view('guest.details', compact('data', 'row'));
    }

    public function products_view(Request $Request)
    {
        $row = [
            [__('Home'), route('views.guest.home')]
        ];
        $data = Product::with('Images');
        $img = null;

        if ($Request->search) {
            $data = $data->search(urldecode($Request->search));
            array_push($row, [__("Search")]);
        }

        if ($Request->category) {
            $Category = Category::where('slug', $Request->category)->first();
            if ($Category) {
                $data = $data->where('category', $Category->id);
                array_push($row, [__("Categories"), route('views.guest.categories')]);
                array_push($row, [ucwords($Category->name), route('views.guest.products', [
                    'category' => $Category->slug
                ])]);
            }
        }

        if ($Request->brand) {
            $Brand = Brand::where('slug', $Request->brand)->first();
            if ($Brand) {
                $data = $data->where('brand', $Brand->id);
                array_push($row, [__("Brands"), route('views.guest.brands')]);
                array_push($row, [ucwords($Brand->name), route('views.guest.products', [
                    'brand' => $Brand->slug
                ])]);
            }
        }

        array_push($row, [__("Products"), route('views.guest.products')]);

        $categories = Category::get();
        $data = $data->cursorPaginate(15);

        return view('guest.products', compact('data', 'categories', 'row', 'img'));
    }

    public function catalogs_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Catalogs'), route('views.guest.catalogs')],
        ];
        $data = Catalog::all();

        return view('guest.catalogs', compact('data', 'row'));
    }

    public function categories_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Categories'), route('views.guest.categories')],
        ];
        $data = Category::all();

        return view('guest.categories', compact('data', 'row'));
    }

    public function brands_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Brands'), route('views.guest.brands')]
        ];
        $data = Brand::all();

        return view('guest.brands', compact('data', 'row'));
    }

    public function quote_view(Request $Request, $id)
    {
        $data = Quotation::with('Items')->findorfail(Crypt::decryptString($id));
        return view('guest.quotation', compact('data'));
    }

    public function contact_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Contact'), route('views.guest.contact')]
        ];

        return view('guest.contact', compact('row'));
    }

    public function terms_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Terms And Conditions'), route('views.guest.terms')]
        ];

        return view('guest.terms', compact('row'));
    }

    public function returns_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Return Policy'), route('views.guest.returns')]
        ];

        return view('guest.returns', compact('row'));
    }

    public function maintenance_view()
    {
        $row = [
            [__('Home'), route('views.guest.home')],
            [__('Maintenance'), route('views.guest.maintenance')]
        ];

        return view('guest.maintenance', compact('row'));
    }

    public function contact_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Mailer::plain([
            'from' => new Address($Request->email, $Request->name),
            'to' => new Address(env('MAIL_CONTACT_ADDRESS'), env('MAIL_NAME')),
            'subject' => __('New Contact Mail'),
            'content' => __('Name') . ': ' . $Request->name . PHP_EOL . __('Phone') . ': ' . $Request->phone . PHP_EOL . PHP_EOL . $Request->message,
        ]);

        return Redirect::back()->with([
            'message' => __('Sent successfully'),
            'type' => 'success'
        ]);
    }
}
