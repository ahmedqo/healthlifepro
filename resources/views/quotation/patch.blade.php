@extends('shared.core.base')
@section('title', __('Edit Quotation') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-2">
        <div class="flex items-center justify-between">
            <h1 class="text-xl lg:text-2xl text-x-black font-x-thin">
                {{ __('Edit Quotation') . ' #' . $data->id }}
            </h1>
            <div class="w-max ms-auto flex flex-wrap">
                <a title="{{ __('Print') }}"
                    href="{{ route('views.quotations.scene', [
                        'id' => $data->id,
                        'print' => 'true',
                    ]) }}"
                    class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                    <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M741-701H220v-160h521v160Zm-17 236q18 0 29.5-10.812Q765-486.625 765-504.5q0-17.5-11.375-29.5T724.5-546q-18.5 0-29.5 12.062-11 12.063-11 28.938 0 18 11 29t29 11Zm-75 292v-139H311v139h338Zm92 86H220v-193H60v-264q0-53.65 36.417-91.325Q132.833-673 186-673h588q54.25 0 90.625 37.675T901-544v264H741v193Z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg-x-white rounded-x-huge shadow-x-core p-4 lg:p-6">
            <form id="form" action="{{ route('actions.quotations.patch', $data->id) }}" method="POST"
                enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 items-start">
                @csrf
                @method('patch')
                <os-text label="{{ __('Name') }}" name="name" value="{{ $data->name }}"></os-text>
                <os-text type="email" label="{{ __('Email') }}" name="email" value="{{ $data->email }}"></os-text>
                <os-text type="tel" label="{{ __('Phone') }}" name="phone" value="{{ $data->phone }}"></os-text>
                <os-text label="{{ __('Reference') }}" name="reference" value="{{ $data->reference }}"></os-text>
                <os-text id="charges-field" type="number" label="{{ __('Charges') }}" name="charges"
                    value="{{ $data->charges }}"></os-text>
                <os-text label="{{ __('Currency') }}" name="currency" value="{{ $data->currency }}"></os-text>
                <os-filter id="products-field" label="{{ __('Product') }}" class="lg:col-span-3"></os-filter>
                <div class="scroll w-full lg:col-span-3 overflow-auto border border-x-black rounded-x-thin">
                    <table class="w-max min-w-full">
                        <thead>
                            <tr>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center w-10">
                                    {{ __('No') }}
                                </td>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 w-28">
                                    {{ __('Reference') }}
                                </td>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4">
                                    {{ __('Name') }}
                                </td>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 text-center w-28">
                                    {{ __('Quantity') }}
                                </td>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 text-center w-28">
                                    {{ __('Price') }}
                                </td>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 text-center w-28">
                                    {{ __('Total') }}
                                </td>
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 pe-6 text-center w-28">
                                    {{ __('Actions') }}
                                </td>
                            </tr>
                        </thead>
                        <tbody id="display">
                            @foreach ($data->Items as $row)
                                <tr class="border-t border-t-x-black">
                                    <td class="text-x-black text-sm font-x-thin p-4 ps-6 text-center w-10">
                                        #{{ $loop->index + 1 }}
                                    </td>
                                    <td class="text-x-black text-base p-4 w-28">
                                        {{ $row->Product->reference }}
                                    </td>
                                    <td class="text-x-black text-base p-4">
                                        <input type="hidden" name="products[]" value="{{ $row->Product->id }}">
                                        {{ $row->Product->name }}
                                    </td>
                                    <td class="text-x-black text-base font-x-thin p-4 text-center w-28">
                                        <input qte type="number" name="quantities[]" value="{{ $row->quantity }}"
                                            class="text-base rounded-x-thin text-x-black font-x-thin text-center px-2 py-1 w-24 outline-x-prime focus:outline-2 bg-transparent border border-x-black">
                                    </td>
                                    <td class="text-x-black text-base font-x-thin p-4 text-center w-28">
                                        <input prc type="number" name="prices[]" value="{{ $row->price }}"
                                            class="text-base rounded-x-thin text-x-black font-x-thin text-center px-2 py-1 w-24 outline-x-prime focus:outline-2 bg-transparent border border-x-black">
                                    </td>
                                    <td dsp class="text-x-black text-base font-x-thin p-4 text-center w-28">
                                        {{ Core::format($row->quantity * $row->price) }}
                                    </td>
                                    <td class="text-x-black text-base p-4 pe-6 text-center w-28">
                                        <button rmv data-key="{{ $row->id }}" type="button"
                                            class="mx-auto px-3 py-1 flex items-center justify-center rounded-x-thin text-x-white hover:text-x-black focus-within:text-x-black bg-red-400 hover:bg-red-200 focus-within:bg-red-200 outline-none">
                                            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                                viewBox="0 -960 960 960">
                                                <path
                                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody>
                            <tr class="border-t border-t-x-black">
                                <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                    {{ __('Sub Total') }}
                                </td>
                                <td id="sub-display" class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                    0.00
                                </td>
                            </tr>
                            <tr class="border-t border-t-x-black">
                                <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                    {{ __('Charges') }}
                                </td>
                                <td id="charges-display"
                                    class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                    0.00
                                </td>
                            </tr>
                            <tr class="border-t border-t-x-black">
                                <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                    {{ __('Total') }}
                                </td>
                                <td id="total-display"
                                    class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                    0.00
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <os-area label="{{ __('Note') }} (en)" name="note_en" value="{{ $data->note_en }}"></os-area>
                <os-area label="{{ __('Note') }} (fr)" name="note_fr" value="{{ $data->note_fr }}"></os-area>
                <os-area label="{{ __('Note') }} (ar)" name="note_ar" value="{{ $data->note_ar }}"></os-area>
                <div class="w-full flex lg:col-span-3">
                    <os-button
                        class="w-full lg:w-max lg:px-20 lg:ms-auto rounded-x-huge px-4 py-2 text-base lg:text-lg font-x-huge text-x-white">
                        <span>{{ __('Save') }}</span>
                    </os-button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        QuotationWatcher(true);
    </script>
@endsection
