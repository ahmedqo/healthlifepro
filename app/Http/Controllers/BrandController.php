<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Brand;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function index_view(Request $Request)
    {
        $data = Brand::orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search($Request->search);
        }
        $data = $data->cursorPaginate(10);
        return view('brand.index', compact('data'));
    }

    public function store_view()
    {
        return view('brand.store');
    }

    public function patch_view($id)
    {
        $data = Brand::findorfail($id);
        return view('brand.patch', compact('data'));
    }

    public function fetch_action(Request $Request)
    {
        return response()->json(
            $Request->search ? Brand::orderBy('id', 'DESC')->search(urldecode($Request->search))->get() : [],
        );
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:brands'],
            'name_fr' => ['required', 'string', 'unique:brands'],
            'name_ar' => ['required', 'string', 'unique:brands'],
            'image' => ['required', new FileRule]
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Brand::create($Request->merge([
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
            'name_en' => ['required', 'string', 'unique:brands,name_en,' . $id],
            'name_fr' => ['required', 'string', 'unique:brands,name_fr,' . $id],
            'name_ar' => ['required', 'string', 'unique:brands,name_ar,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Brand = Brand::findorfail($id);

        if ($Brand->name_en != $Request->name_en) {
            $Request->merge([
                'slug' => Core::slug($Request->name_en),
            ]);
        }

        if ($Request->hasFile('image'))
            Brand::Change($Brand);

        $Brand->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Brand::findorfail($id)->delete();

        return Redirect::route('views.brands.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
