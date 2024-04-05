<?php

namespace App\Http\Controllers;

use App\Functions\Mail as Mailer;
use Illuminate\Http\Request;
use App\Models\Request as _Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Mail\Mailables\Address;

class RequestController extends Controller
{
    public function index_view(Request $Request)
    {
        $data = _Request::with('Items')->orderBy('id', 'DESC');
        if ($Request->search) {
            $data = $data->search($Request->search);
        }
        $data = $data->cursorPaginate(10);
        return view('request.index', compact('data'));
    }

    public function scene_view(Request $Request, $id)
    {
        $data = _Request::with('Items')->findorfail($id);
        return view('request.scene', compact('data'));
    }

    public function store_action(Request $Request)
    {
        $validator = Validator::make($Request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'quantity' => ['required'],
            'product' => ['required'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        _Request::create($Request->all());

        Mailer::plain([
            'from' => new Address(env('MAIL_CONTACT_ADDRESS'), env('MAIL_NAME')),
            'to' => [new Address($Request->email, $Request->name)],
            'subject' => __('Quotation Request'),
            'content' => __('We recived your request. We will send you the quotation via mail as soon as possible'),
        ]);

        Mailer::plain([
            'from' => new Address(env('MAIL_NOREPLAY_ADDRESS'), env('MAIL_NAME')),
            'to' => [new Address(env('MAIL_CONTACT_ADDRESS'), env('MAIL_NAME'))],
            'subject' => __('New Quotation Request'),
            'content' => __('New quotation request available. Check it out'),
        ]);

        return Redirect::back()->with([
            'message' => __('Sent successfully'),
            'type' => 'success',
        ]);
    }

    public function clear_action($id)
    {
        _Request::findorfail($id)->delete();

        return Redirect::route('views.requests.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
