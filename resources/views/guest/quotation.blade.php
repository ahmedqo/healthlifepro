@extends('shared.guest.base')
@section('title', __('Quotation Summary'))

@section('content')
    <div class="my-6 lg:my-10">
        <div class="container mx-auto p-4 flex flex-col gap-2">
            <div class="flex flex-wrap items-center justify-between">
                <h1 class="min-w-max text-xl lg:text-2xl text-x-black font-x-thin">
                    {{ __('Quotations Summary') }}
                </h1>
                <div class="w-max ms-auto flex flex-wrap">
                    <button data-type="print" title="{{ __('Print') }}"
                        class="block p-2 rounded-x-huge text-x-black outline-none !bg-opacity-10 hover:bg-x-black hover:text-x-prime focus:bg-x-black focus:text-x-prime focus-within:bg-x-black focus-within:text-x-prime">
                        <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M741-701H220v-160h521v160Zm-17 236q18 0 29.5-10.812Q765-486.625 765-504.5q0-17.5-11.375-29.5T724.5-546q-18.5 0-29.5 12.062-11 12.063-11 28.938 0 18 11 29t29 11Zm-75 292v-139H311v139h338Zm92 86H220v-193H60v-264q0-53.65 36.417-91.325Q132.833-673 186-673h588q54.25 0 90.625 37.675T901-544v264H741v193Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="bg-x-white border border-x-light rounded-x-huge shadow-x-core p-4 lg:p-6">
                <header class="w-full flex flex-wrap gap-4 items-stretch">
                    <div class="hidden flex-1 lg:flex flex-col gap-2">
                        <img alt="logo-image" src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}"
                            class="block w-max h-20 object-contain object-center" />
                        <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] ms-[5px] mt-auto"></div>
                    </div>
                    <div class="w-full lg:w-max flex flex-col gap-2">
                        <div class="w-full lg:w-max flex flex-col items-center lg:items-start lg:mx-4 my-auto">
                            <h1 class="text-x-black">
                                <span class="font-x-core">{{ __('Ref No') }}</span>:
                                {{ strtoupper($data->reference) }}
                            </h1>
                            <h1 class="text-x-black">
                                <span class="font-x-core">{{ __('Date') }}</span>:
                                {{ $data->created_at }}
                            </h1>
                            <h1 class="text-x-black">
                                <span class="font-x-core">{{ __('Customer Name') }}</span>:
                                {{ ucwords($data->name) }}
                            </h1>
                        </div>
                        <div class="hidden lg:flex gap-2 skew-x-[-20deg] mt-auto">
                            <div class="w-[2rem] h-10 bg-x-acent"></div>
                            <div class="flex-1 h-10 bg-x-acent me-[8px]"></div>
                        </div>
                    </div>
                </header>
                <div class="flex flex-col mt-10 lg:my-20">
                    <h1 class="text-x-black font-x-core text-xl mb-6 leading-[1] text-center">
                        {{ __('Quotation') }}
                    </h1>
                    <div class="border-x-black border w-full rounded-x-huge scroll overflow-auto">
                        <table class="min-w-full w-max">
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
                                        {{ __('Price') }} ({{ $data->currency }})
                                    </td>
                                    <td class="text-x-black text-sm font-x-thin py-2 px-4 pe-6 text-center w-28">
                                        {{ __('Total') }} ({{ $data->currency }})
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->Items as $row)
                                    <tr class="border-t border-t-x-black">
                                        <td class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center w-10">
                                            #{{ $loop->index + 1 }}
                                        </td>
                                        <td class="text-x-black text-base py-2 px-4 w-28">
                                            {{ $row->Product->reference }}
                                        </td>
                                        <td class="text-x-black text-base py-2 px-4">
                                            {{ $row->Product->name }}
                                        </td>
                                        <td class="text-x-black text-base py-2 px-4 text-center w-28">
                                            {{ $row->quantity }}
                                        </td>
                                        <td class="text-x-black text-base py-2 px-4 text-center w-28">
                                            {{ Core::format($row->price) }}
                                        </td>
                                        <td dsp class="text-x-black text-base py-2 px-4 pe-6 text-center w-28">
                                            {{ Core::format($row->quantity * $row->price) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr class="border-t border-t-x-black">
                                    <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                        {{ __('Sub Total') }} ({{ $data->currency }})
                                    </td>
                                    <td id="sub-display"
                                        class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                        {{ Core::format($data->Total()) }}
                                    </td>
                                </tr>
                                <tr class="border-t border-t-x-black">
                                    <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                        {{ __('Charges') }} ({{ $data->currency }})
                                    </td>
                                    <td id="charges-display"
                                        class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                        {{ Core::format($data->Charges()) }}
                                    </td>
                                </tr>
                                <tr class="border-t border-t-x-black">
                                    <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                        {{ __('Total') }} ({{ $data->currency }})
                                    </td>
                                    <td id="total-display"
                                        class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                        {{ Core::format($data->Total() + $data->Charges()) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if ($data->note)
                        <p class="text-x-black font-x-core mt-4">
                            {{ $data->note }}
                        </p>
                    @endif
                </div>
                <footer class="hidden w-full lg:flex flex-wrap gap-4 items-stretch">
                    <div class="flex-1 flex flex-wrap gap-2 skew-x-[-20deg]">
                        <div class="flex-1 h-full bg-x-acent ms-[8px]"></div>
                        <div class="w-[2rem] h-full bg-x-acent"></div>
                    </div>
                    <div class="w-8/12 flex flex-col gap-2">
                        <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] me-[5px]"></div>
                        <div class="flex gap-4 justify-around">
                            <h1 class="text-x-black font-x-core">{{ request()->getHost() }}</h1>
                            <h1 class="text-x-black font-x-core">{{ env('MAIL_CONTACT_ADDRESS') }}</h1>
                            <h1 class="text-x-black font-x-core">{{ env('PHONE_CONTACT_NUMBER') }}</h1>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <div id="page" class="hidden">
        <header class="fixed top-0 left-0 right-0 w-full flex flex-wrap gap-4 items-stretch">
            <div class="flex-1 flex flex-col gap-2">
                <img alt="logo-image" src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}"
                    class="block w-max h-20 object-contain object-center" />
                <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] ms-[5px] mt-auto"></div>
            </div>
            <div class="w-max flex flex-col gap-2">
                <div class="w-max flex flex-col mx-4 my-auto">
                    <h1 class="text-x-black">
                        <span class="font-x-core">{{ __('Ref No') }}</span>:
                        {{ strtoupper($data->reference) }}
                    </h1>
                    <h1 class="text-x-black">
                        <span class="font-x-core">{{ __('Date') }}</span>:
                        {{ $data->created_at }}
                    </h1>
                    <h1 class="text-x-black">
                        <span class="font-x-core">{{ __('Customer Name') }}</span>:
                        {{ ucwords($data->name) }}
                    </h1>
                </div>
                <div class="flex gap-2 skew-x-[-20deg] mt-auto">
                    <div class="w-[2rem] h-10 bg-x-acent"></div>
                    <div class="flex-1 h-10 bg-x-acent me-[8px]"></div>
                </div>
            </div>
        </header>
        <div class="flex flex-col my-4">
            <h1 class="text-x-black font-x-core text-xl mb-6 leading-[1] text-center">
                {{ __('Quotation') }}
            </h1>
            <div class="border-x-black border w-full rounded-x-huge">
                <table class="w-full">
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
                                {{ __('Price') }} ({{ $data->currency }})
                            </td>
                            <td class="text-x-black text-sm font-x-thin py-2 px-4 pe-6 text-center w-28">
                                {{ __('Total') }} ({{ $data->currency }})
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->Items as $row)
                            <tr class="border-t border-t-x-black">
                                <td class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center w-10">
                                    #{{ $loop->index + 1 }}
                                </td>
                                <td class="text-x-black text-base py-2 px-4 w-28">
                                    {{ $row->Product->reference }}
                                </td>
                                <td class="text-x-black text-base py-2 px-4">
                                    {{ $row->Product->name }}
                                </td>
                                <td class="text-x-black text-base py-2 px-4 text-center w-28">
                                    {{ $row->quantity }}
                                </td>
                                <td class="text-x-black text-base py-2 px-4 text-center w-28">
                                    {{ Core::format($row->price) }}
                                </td>
                                <td dsp class="text-x-black text-base py-2 px-4 pe-6 text-center w-28">
                                    {{ Core::format($row->quantity * $row->price) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                        <tr class="border-t border-t-x-black">
                            <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                {{ __('Sub Total') }} ({{ $data->currency }})
                            </td>
                            <td id="sub-display" class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                {{ Core::format($data->Total()) }}
                            </td>
                        </tr>
                        <tr class="border-t border-t-x-black">
                            <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                {{ __('Charges') }} ({{ $data->currency }})
                            </td>
                            <td id="charges-display"
                                class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                {{ Core::format($data->Charges()) }}
                            </td>
                        </tr>
                        <tr class="border-t border-t-x-black">
                            <td colspan="5" class="text-x-black text-sm font-x-thin py-2 px-4 ps-6 text-center">
                                {{ __('Total') }} ({{ $data->currency }})
                            </td>
                            <td id="total-display" class="text-x-black text-base font-x-thin py-2 px-4 text-center w-28">
                                {{ Core::format($data->Total() + $data->Charges()) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if ($data->note)
                <p class="text-x-black font-x-core mt-4">
                    {{ $data->note }}
                </p>
            @endif
        </div>
        <footer class="fixed bottom-0 left-0 right-0 w-full flex flex-wrap gap-4 items-stretch">
            <div class="flex-1 flex flex-wrap gap-2 skew-x-[-20deg]">
                <div class="flex-1 h-full bg-x-acent ms-[8px]"></div>
                <div class="w-[2rem] h-full bg-x-acent"></div>
            </div>
            <div class="w-8/12 flex flex-col gap-2">
                <div class="w-[calc(100%-5px)] h-4 bg-x-prime skew-x-[-20deg] me-[5px]"></div>
                <div class="flex gap-4 justify-around">
                    <h1 class="text-x-black font-x-core">{{ request()->getHost() }}</h1>
                    <h1 class="text-x-black font-x-core">{{ env('MAIL_CONTACT_ADDRESS') }}</h1>
                    <h1 class="text-x-black font-x-core">{{ env('PHONE_CONTACT_NUMBER') }}</h1>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('scripts')
    <script>
        Print.opts.css = [
            `<link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ env('APP_VERSION') }}" />`,
            `<link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ env('APP_VERSION') }}" />`,
        ];
        Print.opts.size = {
            head: "150px",
            foot: "70px",
            page: "A4"
        }
        Print("#page", {
            trigger: "[data-type=print]",
            clear: true,
            @if (request('print'))
                exec: true
            @endif
        });
    </script>
@endsection
