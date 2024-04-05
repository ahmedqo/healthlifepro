<?php

namespace App\Http\Controllers;

use App\Functions\Mail as Mailer;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Mail\Mailables\Address;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\QuotationItem;
use App\Models\Request as _Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class QuotationController extends Controller
{
    public function index_view(Request $Request)
    {
        $data = Quotation::with('Items')->orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search($Request->search);
        }
        $data = $data->cursorPaginate(10);
        return view('quotation.index', compact('data'));
    }

    public function store_view(Request $Request)
    {
        $data = null;
        if ($Request->target) {
            $data = _Request::with('Items')->findorfail($Request->target);
        }
        return view('quotation.store', compact('data'));
    }

    public function patch_view($id)
    {
        $data = Quotation::with('Items')->findorfail($id);
        return view('quotation.patch', compact('data'));
    }

    public function scene_view(Request $Request, $id)
    {
        $data = Quotation::with('Items')->findorfail($id);
        return view('quotation.scene', compact('data'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'reference' => ['required', 'string'],
            'charges' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'quantities' => ['required'],
            'products' => ['required'],
            'prices' => ['required'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Current = Quotation::create($Request->all());

        Mailer::plain([
            'from' => new Address(env('MAIL_CONTACT_ADDRESS'), env('APP_NAME')),
            'to' => new Address($Current->email, $Current->name),
            'subject' => ucwords(__('Request quotation')),
            'content' => __('You can view and print your quotation by clicking the link below'),
            'link' => [
                'url' => route('views.guest.quote', Crypt::encryptString($Current->id)),
                'txt' => __('Preview Quotation')
            ]
        ]);

        return Redirect::route('views.quotations.store')->with([
            'message' => __('Created successfully'),
            'type' => 'success',
            'clean' => true,
        ]);
    }

    public function patch_action(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'reference' => ['required', 'string'],
            'charges' => ['required', 'string'],
            'currency' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $Current = Quotation::findorfail($id);

        if ($Request->remove && !$Request->products && $Current->Items->count() == count($Request->remove)) {
            return Redirect::back()->withInput()->with([
                'message' => 'The product field is required',
                'type' => 'error'
            ]);
        }

        QuotationItem::where('quotation', $Current->id)->delete();
        $Current->update($Request->all());

        foreach ($Request->products as $key => $value) {
            QuotationItem::create([
                'quotation' => $Current->id,
                'quantity' => $Request->quantities[$key],
                'product' => $Request->products[$key],
                'price' => $Request->prices[$key],
            ]);
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success',
            'clean' => true,
        ]);
    }

    public function clear_action($id)
    {
        Quotation::findorfail($id)->delete();

        return Redirect::route('views.quotations.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
