<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index_view(Request $Request)
    {
        $data = Product::with('Images')->orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search($Request->search);
        }
        $data = $data->cursorPaginate(10);
        return view('product.index', compact('data'));
    }

    public function store_view()
    {
        return view('product.store');
    }

    public function patch_view($id)
    {
        $data = Product::with('Images')->findorfail($id);
        return view('product.patch', compact('data'));
    }

    public function fetch_action(Request $Request)
    {
        return response()->json(
            $Request->search ? Product::orderBy('id', 'DESC')->search(urldecode($Request->search))->get() : [],
        );
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:products'],
            'name_fr' => ['required', 'string', 'unique:products'],
            'name_ar' => ['required', 'string', 'unique:products'],
            'images' => ['required', new FileRule],
            'category' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Product::create($Request->merge([
            'slug' => Core::slug($Request->name_en),
        ])->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:products,name_en,' . $id],
            'name_fr' => ['required', 'string', 'unique:products,name_fr,' . $id],
            'name_ar' => ['required', 'string', 'unique:products,name_ar,' . $id],
            'category' => ['required', 'integer'],
            'brand' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Product = Product::findorfail($id);

        if ($Request->remove && !$Request->hasFile('images') && $Product->Images->count() == count($Request->remove)) {
            return Redirect::back()->withInput()->with([
                'message' => 'The images field is required',
                'type' => 'error'
            ]);
        }

        if ($Request->hasFile('images')) {
            foreach ($Request->file('images') as $file) {
                ProductImage::Upload($file, $Product->id);
            }
        }

        if ($Request->remove) {
            foreach ($Request->remove as $remove) {
                ProductImage::findorfail($remove)->delete();
            }
        }

        if ($Product->name_en != $Request->name_en) {
            $Request->merge([
                'slug' => Core::slug($Request->name_en),
            ]);
        }

        $Product->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Product::findorfail($id)->delete();

        return Redirect::route('views.products.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
