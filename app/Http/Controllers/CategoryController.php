<?php

namespace App\Http\Controllers;


use App\Functions\Core;
use App\Models\Category;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index_view(Request $Request)
    {
        $data = Category::orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search($Request->search);
        }
        $data = $data->cursorPaginate(10);
        return view('category.index', compact('data'));
    }

    public function store_view()
    {
        return view('category.store');
    }

    public function patch_view($id)
    {
        $data = Category::findorfail($id);
        return view('category.patch', compact('data'));
    }

    public function fetch_action(Request $Request)
    {
        return response()->json(
            $Request->search ? Category::orderBy('id', 'DESC')->search(urldecode($Request->search))->get() : [],
        );
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:categories'],
            'name_fr' => ['required', 'string', 'unique:categories'],
            'name_ar' => ['required', 'string', 'unique:categories'],
            'image' => ['required', new FileRule]
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Category::create($Request->merge([
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
            'name_en' => ['required', 'string', 'unique:categories,name_en,' . $id],
            'name_fr' => ['required', 'string', 'unique:categories,name_fr,' . $id],
            'name_ar' => ['required', 'string', 'unique:categories,name_ar,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Category = Category::findorfail($id);

        if ($Category->name_en != $Request->name_en) {
            $Request->merge([
                'slug' => Core::slug($Request->name_en),
            ]);
        }

        if ($Request->hasFile('image'))
            Category::Change($Category);

        $Category->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Upadated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Category::findorfail($id)->delete();

        return Redirect::route('views.categories.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
