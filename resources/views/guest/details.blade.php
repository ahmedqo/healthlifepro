@extends('shared.guest.base')
@section('title', $data->name)

@section('content')
    <section id="hero" style="background-image: url({{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full isolate bg-gray-800 bg-cover bg-no-repeat relative bg-center">
        <div class="absolute inset-0 w-full h-full bg-x-black bg-opacity-40 backdrop-blur-sm z-[-1]"></div>
        <div class="w-full p-4 container mx-auto min-h-[6rem] aspect-[5/1] flex items-center justify-center">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl">
                {{ __('Product Details') }}
            </h1>
        </div>
    </section>
    <div class="my-6 lg:my-10">
        <section id="mini-navigation" class="-mb-4">
            <div class="container mx-auto p-4 flex flex-col gap-4">
                @include('shared.guest.list', [
                    'items' => $row,
                ])
            </div>
        </section>
        <section id="details">
            <div class="container mx-auto p-4 flex flex-col gap-4">
                <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-12 gap-4">
                    <div class="w-full lg:col-span-7">
                        <div class="w-full flex flex-col gap-4 sticky top-4">
                            <div class="w-full relative">
                                <div id="slide"
                                    class="w-full aspect-video bg-x-white shadow-x-core rounded-x-huge border border-gray-200">
                                    <ul class="w-full h-full">
                                        @foreach ($data->Images as $image)
                                            <li class="w-full h-full flex items-center justify-center">
                                                <img src="{{ $image->Url }}"
                                                    alt="{{ $data->slug }}-image-{{ $loop->index + 1 }}"
                                                    class="block w-full h-full object-contain" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div dir="ltr"
                                    class="flex w-full p-2 justify-between items-center absolute top-1/2 -translate-y-1/2 left-0 right-0 pointer-events-none">
                                    <button id="prev"
                                        class="shadow-md pointer-events-auto flex rounded-full w-8 h-8 items-center justify-center bg-x-prime text-x-white bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                        <svg class="pointer-events-none w-6 h-6" fill="currentColor" viewBox="0 96 960 960">
                                            <path
                                                d="M528 805 331 607q-7-6-10.5-14t-3.5-18q0-9 3.5-17.5T331 543l198-199q13-12 32-12t33 12q13 13 12.5 33T593 410L428 575l166 166q13 13 13 32t-13 32q-14 13-33.5 13T528 805Z" />
                                        </svg>
                                    </button>
                                    <button id="next"
                                        class="shadow-md pointer-events-auto flex rounded-full w-8 h-8 items-center justify-center bg-x-prime text-x-white bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                        <svg class="pointer-events-none w-6 h-6" fill="currentColor" viewBox="0 96 960 960">
                                            <path
                                                d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:col-span-5 flex flex-col gap-5 lg:gap-6">
                        <div class="flex flex-col">
                            <h1 class="font-x-huge text-x-black text-lg lg:text-2xl">
                                {{ $data->name }}
                            </h1>
                            <h3 class="font-x-thin text-gray-500 text-xs lg:text-base">{{ __('Ref') }}:
                                {{ $data->reference }}</h3>
                        </div>
                        <div class="flex flex-col gap-3">
                            @if ($data->details)
                                <p class="text-base text-gray-800">
                                    {!! nl2br($data->details) !!}
                                </p>
                            @endif
                            <div class="w-max flex flex-col gap-2">
                                <h6 class="text-sm font-x-huge text-x-black">{{ __('Brand') }}:</h6>
                                <div class="flex gap-2 items-center">
                                    <a
                                        href="{{ route('views.guest.products', [
                                            'brand' => $data->Brand->slug,
                                        ]) }}">
                                        <img src="{{ $data->Brand->Image }}" src="{{ $data->Brand->slug }}-image"
                                            class="block max-h-[3rem] max-w-[6rem] object-contain object-left rtl:object-right aspect-video w-[6rem]" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form id="form" action="{{ route('actions.requests.store') }}" method="POST"
                            class="w-full flex flex-col mt-auto gap-5 lg:gap-6">
                            @csrf
                            <input type="hidden" name="product" value="{{ $data->id }}">
                            <div id="counter" class="flex flex-wrap w-max gap-1 items-center">
                                <button counter="-"
                                    class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M225-434q-20.75 0-33.375-13.36Q179-460.719 179-479.86q0-20.14 12.625-32.64T225-525h511q19.775 0 32.888 12.675Q782-499.649 782-479.509q0 19.141-13.112 32.325Q755.775-434 736-434H225Z" />
                                    </svg>
                                </button>
                                <input counter="x" type="number" name="quantity" value="1"
                                    class="w-20 text-center bg-transparent text-x-black font-x-huge p-1 text-md rounded-md focus-within:outline-x-prime focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                                <button counter="+"
                                    class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                    </svg>
                                </button>
                            </div>
                            <os-button type="button" id="quotation"
                                class="w-full rounded-x-huge px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                {{ __('Request Quotation') }}
                            </os-button>
                            <os-modal id="modal" label="{{ __('Request Quotation') }}">
                                <div class="flex flex-col p-4 gap-4 lg:p-6 lg:gap-6">
                                    <os-text label="{{ __('Name') }}" name="name"
                                        value="{{ old('name') }}"></os-text>
                                    <os-text type="email" label="{{ __('Email') }}" name="email"
                                        value="{{ old('email') }}"></os-text>
                                    <os-text type="tel" label="{{ __('Phone') }}" name="phone"
                                        value="{{ old('phone') }}"></os-text>
                                    <os-area rows="2" label="{{ __('Message') }}" name="message"
                                        value="{{ old('message') }}"></os-area>
                                    <os-button
                                        class="w-full rounded-x-huge px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                        {{ __('Send Request') }}
                                    </os-button>
                                </div>
                            </os-modal>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @if ($data->description)
            <section id="description">
                <div class="container mx-auto p-4 flex flex-col gap-4">
                    <h2 class="text-x-black font-x-huge text-xl">
                        {{ __('Description') }}
                    </h2>
                    <div class="revert">
                        {!! $data->description !!}
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        DetailsStyler({{ Core::lang('ar') }});
    </script>
@endsection
