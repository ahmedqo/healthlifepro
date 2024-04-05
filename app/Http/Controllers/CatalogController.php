<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Catalog;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CatalogController extends Controller
{
    public function index_view(Request $Request)
    {
        $data = Catalog::orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search($Request->search);
        }
        $data = $data->cursorPaginate(10);
        return view('catalog.index', compact('data'));
    }

    public function store_view()
    {
        return view('catalog.store');
    }

    public function patch_view($id)
    {
        $data = Catalog::findorfail($id);
        return view('catalog.patch', compact('data'));
    }

    public function fetch_action(Request $Request)
    {
        return response()->json(
            $Request->search ? Catalog::orderBy('id', 'DESC')->search(urldecode($Request->search))->get() : [],
        );
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:catalogs'],
            'name_fr' => ['required', 'string', 'unique:catalogs'],
            'name_ar' => ['required', 'string', 'unique:catalogs'],
            'image' => ['required', new FileRule],
            'file' => ['required', new FileRule],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Catalog::create($Request->all());

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name_en' => ['required', 'string', 'unique:catalogs,name_en,' . $id],
            'name_fr' => ['required', 'string', 'unique:catalogs,name_fr,' . $id],
            'name_ar' => ['required', 'string', 'unique:catalogs,name_ar,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Catalog = Catalog::findorfail($id);

        if ($Request->hasFile('image'))
            Catalog::Change($Catalog, 'storage', 'image');

        if ($Request->hasFile('file'))
            Catalog::Change($Catalog, 'document', 'file');

        $Catalog->update($Request->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function clear_action($id)
    {
        Catalog::findorfail($id)->delete();

        return Redirect::route('views.catalogs.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
