@extends('shared.guest.base')
@section('title', __('Home'))

@section('content')
    <section data-aos="zoom-in-down" id="hero" class="w-full bg-gray-800 relative">
        <div id="slides" class="w-full h-full">
            <ul class="w-full h-full">
                <li class="flex flex-col relative isolate bg-cover bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_1.webp') }}?v={{ env('APP_VERSION') }});">
                    <div class="bg-x-black bg-opacity-60 z-[-1] absolute w-full h-full inset-0 pointer-events-none"></div>
                    <div style="direction: {{ Core::lang('ar') ? 'rtl' : 'ltr' }}"
                        class="container m-auto p-4 py-10 lg:py-20 pb-12 lg:ps-12">
                        <div class="w-full lg:w-1/2 flex flex-col gap-4">
                            <h1 class="w-full text-start text-3xl lg:text-5xl font-x-huge text-x-white">
                                {!! __('Enhancing Patient Care & <span class="text-x-core">Satisfaction</span>') !!}
                            </h1>
                            <p class="w-full text-start text-x-white font-x-thin text-base lg:text-lg">
                                {{ __('Our commitment to exceptional quality products ensures top-notch design, functionality, and durability - catering to healthcare professionals\' needs and positively impacting your bottom line') }}
                            </p>
                            <a href="{{ route('views.guest.brands') }}"
                                class="px-6 py-2 mt-4 text-base lg:text-lg font-x-thin text-x-white rounded-md w-max bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                {{ __('View More') }}
                            </a>
                        </div>
                    </div>
                </li>
                <li class="flex flex-col relative isolate bg-cover bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_2.webp') }}?v={{ env('APP_VERSION') }});">
                    <div class="bg-x-black bg-opacity-60 z-[-1] absolute w-full h-full inset-0 pointer-events-none"></div>
                    <div style="direction: {{ Core::lang('ar') ? 'rtl' : 'ltr' }}"
                        class="container m-auto p-4 py-10 lg:py-20 pb-12 lg:ps-12">
                        <div class="w-full lg:w-1/2 flex flex-col gap-4">
                            <h1 class="w-full text-start text-3xl lg:text-5xl font-x-huge text-x-white">
                                {!! __('Advanced Medical <span class="text-x-core">Solutions</span>') !!}
                            </h1>
                            <p class="w-full text-start text-x-white font-x-thin text-base lg:text-lg">
                                {{ __('Comprehensive range of sutures, capital equipment, precision hand instruments, PPE & beyond for cutting-edge healthcare') }}
                            </p>
                            <a href="{{ route('views.guest.categories') }}"
                                class="px-6 py-2 mt-4 text-base lg:text-lg font-x-thin text-x-white rounded-md w-max bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                {{ __('View More') }}
                            </a>
                        </div>
                    </div>
                </li>
                <li class="flex flex-col relative isolate bg-cover bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_3.webp') }}?v={{ env('APP_VERSION') }});">
                    <div class="bg-x-black bg-opacity-60 z-[-1] absolute w-full h-full inset-0 pointer-events-none"></div>
                    <div style="direction: {{ Core::lang('ar') ? 'rtl' : 'ltr' }}"
                        class="container m-auto p-4 py-10 lg:py-20 pb-12 lg:ps-12">
                        <div class="w-full lg:w-1/2 flex flex-col gap-4">
                            <h1 class="w-full text-start text-3xl lg:text-5xl font-x-huge text-x-white">
                                {!! __('<span class="text-x-core">Medical</span> Equipment Maintenance & Repair') !!}
                            </h1>
                            <p class="w-full text-start text-x-white font-x-thin text-base lg:text-lg">
                                {{ __('Comprehensive support for surgical and biomedical equipment troubleshooting and repair. Let us ensure the uninterrupted flow of your operations') }}
                            </p>
                            <a href="{{ route('views.guest.maintenance') }}"
                                class="px-6 py-2 mt-4 text-base lg:text-lg font-x-thin text-x-white rounded-md w-max bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                                {{ __('View More') }}
                            </a>
                        </div>
                    </div>
                </li>
                <li class="flex flex-col relative isolate bg-contain bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_4.webp') }}?v={{ env('APP_VERSION') }});">
                </li>
                <li class="flex flex-col relative isolate bg-contain bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_5.webp') }}?v={{ env('APP_VERSION') }});">
                </li>
                <li class="flex flex-col relative isolate bg-contain bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_6.webp') }}?v={{ env('APP_VERSION') }});">
                </li>
                <li class="flex flex-col relative isolate bg-contain bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_7.webp') }}?v={{ env('APP_VERSION') }});">
                </li>
                <li class="flex flex-col relative isolate bg-contain bg-center bg-no-repeat"
                    style="background-image: url({{ asset('img/slide_8.webp') }}?v={{ env('APP_VERSION') }});">
                </li>
            </ul>
        </div>
        <div class="absolute w-full h-full inset-0 pointer-events-none">
            <div
                class="container mx-auto p-4 w-full h-full flex justify-center items-end flex-wrap gap-2 lg:flex-col lg:justify-center lg:items-start">
                <button
                    class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto !bg-x-prime bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
                <button class="dots block w-6 h-1 lg:w-1 lg:h-6 rounded-full pointer-events-auto bg-x-white"></button>
            </div>
        </div>
    </section>
    @if ($collection->count())
        <section id="shop">
            <div class="container mx-auto p-4 my-6 lg:my-10">
                <h2 data-aos="zoom-out" class="text-center text-x-core text-xl lg:text-3xl font-x-huge uppercase">
                    {{ __('Shop By Category') }}
                </h2>
                <div class="grid grid-rows-1 grid-cols-3 border-b-2 border-x-prime mt-6 lg:mt-10 mb-6">
                    @foreach ($collection as $row)
                        <button data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}"
                            data-tab="{{ $loop->index + 1 }}"
                            class="group p-2 lg:p-4 aspect-[16/12] lg:aspect-video rounded-t-x-core border-2 border-b-2 border-transparent -mb-[2px] {{ $loop->index > 0 ? '' : '!border-x-prime !border-b-white' }}">
                            <div
                                class="p-2 lg:p-4 w-full h-full relative flex items-center justify-center rounded-x-huge overflow-hidden isolate">
                                <div class="absolute inset-0 block w-full h-full z-[-1] overflow-hidden">
                                    <img src="{{ $row['category']->Image }}" alt="{{ $row['category']->slug }}-image"
                                        class="block w-full h-full object-cover object-center transition-transform duration-150 group-hover:scale-150" />
                                </div>
                                <div
                                    class="absolute inset-0 block w-full h-full bg-x-black bg-opacity-30 z-[-1] pointer-events-none">
                                </div>
                                <h2 style="-webkit-line-clamp: 2"
                                    class="truncate-x-core text-x-white font-x-huge text-xs lg:text-xl uppercase">
                                    {{ $row['category']->name }}
                                </h2>
                            </div>
                        </button>
                    @endforeach
                </div>
                @foreach ($collection as $row)
                    <ul data-aos="fade-down" data-aos-delay="{{ $loop->index * 150 }}" data-tabs="{{ $loop->index + 1 }}"
                        class="{{ $loop->index > 0 ? 'hidden' : 'grid' }} grid-rows-1 grid-cols-2 lg:grid-cols-4 gap-4">
                        @forelse ($row['products'] as $sub)
                            <li>
                                <a href="{{ route('views.guest.details', $sub->slug) }}"
                                    class="block w-full aspect-[16/12] shadow-x-core rounded-x-huge border border-x-black border-opacity-10 overflow-hidden">
                                    <img src="{{ $sub->Images[0]->Url }}" alt="{{ $sub->slug }}-image"
                                        class="block w-full h-full object-cover object-center transition-transform duration-150 hover:scale-150" />
                                </a>
                                <div class="p-2">
                                    <h3 style="-webkit-line-clamp: 2"
                                        class="truncate-x-core font-x-thin text-x-black text-sm lg:text-base flex-1 text-center">
                                        {{ $sub->name }}
                                    </h3>
                                </div>
                            </li>
                        @empty
                            <li class="col-span-2 lg:col-span-4">
                                <h4 class="text-xl lg:text-2xl text-center px-4 py-10 text-x-black font-x-huge">
                                    {{ __('NO DATA FOUND') }}
                                </h4>
                            </li>
                        @endforelse
                    </ul>
                @endforeach
            </div>
        </section>
    @endif
    <section id="about" style="background-image: url({{ asset('img/pattern.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full bg-gray-800 bg-cover bg-no-repeat bg-center">
        <div
            class="container items-center mx-auto p-4 py-8 lg:py-20 grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10">
            <div data-aos="zoom-out-{{ Core::lang('ar') ? 'right' : 'left' }}"
                class="rounded-x-huge overflow-hidden aspect-video lg:order-1">
                <img src="{{ asset('img/about.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-about-image"
                    class="block w-full h-full object-cover object-center" />
            </div>
            <div class="w-full flex flex-col gap-4">
                <h2 data-aos="fade-up" data-aos-delay="150" class="text-base lg:text-lg font-x-thin text-x-white -mb-3">
                    {{ __('About') }}</h2>
                <h1 data-aos="fade-up" data-aos-delay="300"
                    class="text-x-core text-2xl lg:text-4xl font-x-huge uppercase">
                    {{ __('HEALTH LIFE PRO') }}
                </h1>
                <p data-aos="fade-up" data-aos-delay="450" class="text-x-white text-base">
                    {{ __('It distinguishes itself as an expert in the supply of medical equipment, catering to both healthcare professionals and individuals') }}
                </p>
                <p data-aos="fade-up" data-aos-delay="600" class="text-x-white text-base">
                    {{ __('We proceed with the selection and distribution of products from the most eminent brands, offering you the opportunity to practice your profession or take care of your health with the best equipment, all at advantageous rates') }}
                </p>
                <a data-aos="fade-up" data-aos-delay="750" href="{{ route('views.guest.contact') }}"
                    class="px-6 py-2 mt-4 text-base lg:text-lg font-x-thin text-x-white rounded-md w-max bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                    {{ __('Learn More') }}
                </a>
            </div>
        </div>
    </section>
    @if ($products->count())
        <section id="new">
            <div class="container mx-auto p-4 my-6 lg:my-10">
                <h2 data-aos="zoom-out" class="text-center text-x-core text-xl lg:text-3xl font-x-huge uppercase">
                    {{ __('New Arrival') }}
                </h2>
                <div data-aos="fade-down" id="products" class="w-full mt-6 lg:mt-10">
                    <ul class="w-full h-full pb-2">
                        @foreach ($products as $row)
                            <li
                                class="p-4 gap-2 flex flex-col rounded-x-huge border border-x-black border-opacity-10 bg-x-white">
                                <div class="w-full aspect-[16/12] rounded-x-huge overflow-hidden shadow-x-core bg-white">
                                    <img src="{{ $row->Images[0]->Url }}" alt="{{ $row->slug }}-image"
                                        class="block w-full h-full object-cover object-center transition-transform duration-150 hover:scale-150" />
                                </div>
                                <h3 style="-webkit-line-clamp: 2"
                                    class="truncate-x-core text-sm lg:text-base font-x-huge text-x-black flex-1 text-center">
                                    {{ $row->name }}
                                </h3>
                                <a href="{{ route('views.guest.details', $row->slug) }}"
                                    class="text-sm lg:text-base mx-auto w-max mt-2 block font-x-thin text-x-prime">
                                    {{ __('view') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif
    <section id="tags" class="bg-x-light">
        <div class="w-full container mx-auto p-4 my-6 lg:my-6 lg:py-10">
            <h2 data-aos="zoom-out" class="text-center text-x-core text-xl lg:text-3xl font-x-huge uppercase">
                {{ __('Recognitions') }}
            </h2>
            <div class="flex items-center justify-center gap-4 lg:gap-10 mt-6 lg:mt-10 bg-center bg-cover bg-no-repeat">
                <img data-aos="fade-down" data-aos-delay="150"
                    src="{{ asset('img/tag_1.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-tags-image-1"
                    class="w-20 lg:w-32 block" />
                <img data-aos="fade-down" data-aos-delay="300"
                    src="{{ asset('img/tag_2.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-tags-image-2"
                    class="w-20 lg:w-32 block" />
                <img data-aos="fade-down" data-aos-delay="450"
                    src="{{ asset('img/tag_3.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-tags-image-3"
                    class="w-20 lg:w-32 block" />
            </div>
        </div>
    </section>
    @if ($brands->count())
        <section id="partners">
            <div class="container mx-auto p-4 my-6 lg:my-10">
                <h2 data-aos="zoom-out" class="text-center text-x-core text-xl lg:text-3xl font-x-huge uppercase">
                    {{ __('Brands') }}
                </h2>
                <div data-aos="fade-up" id="brands" class="w-full mt-6 lg:mt-10">
                    <ul class="w-full h-full pb-2">
                        @foreach ($brands as $row)
                            <li class="shadow-x-core rounded-x-huge border border-x-black border-opacity-10">
                                <a href="{{ route('views.guest.products', [
                                    'brand' => $row->slug,
                                ]) }}"
                                    class="w-full aspect-square overflow-hidden p-4 flex items-center justify-center bg-x-white">
                                    <img src="{{ $row->Image }}" alt="{{ $row->slug }}-image"
                                        class="aspect-video w-full block max-w-full max-h-full object-contain object-center" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif
    <section id="fix">
        <div style="background-image: url({{ asset('img/pattern.webp') }}?v={{ env('APP_VERSION') }})"
            class="w-full bg-gray-800 bg-cover bg-no-repeat bg-center">
            <div class="container mx-auto p-4 pt-10 !pb-24">
                <h2 data-aos="zoom-out" class="text-center text-x-core text-xl lg:text-3xl font-x-huge uppercase">
                    {{ __('Fix And Repairs') }}
                </h2>
                <div class="w-full flex flex-col gap-6 lg:gap-10 lg:flex-row mt-6 lg:mt-10">
                    <div data-aos="zoom-in-{{ Core::lang('ar') ? 'left' : 'right' }}" data-aos-delay="150"
                        class="w-full lg:my-auto flex flex-col gap-4 lg:flex-1">
                        <p class="text-x-white text-base">
                            {{ __('At HEALTH LIFE PRO, we specialize in the comprehensive repair and maintenance of medical equipment. Our experienced team is dedicated to ensuring that your medical devices are restored to optimal functionality promptly') }}
                        </p>
                        <p class="text-x-white text-base">
                            {{ __('Don\'t let a malfunctioning medical device disrupt your operations. Contact us today through WhatsApp, and let us take care of the repair process efficiently. Your satisfaction and the smooth operation of your medical equipment are our top priorities') }}
                        </p>
                    </div>
                    <div data-aos="zoom-in-{{ Core::lang('ar') ? 'right' : 'left' }}" data-aos-delay="150"
                        style="background-image: url({{ asset('img/contact.webp') }}?v={{ env('APP_VERSION') }});"
                        class="w-full lg:flex-1 relative isolate bg-cover bg-center bg-no-repeat rounded-x-huge">
                        <div class="bg-x-black bg-opacity-60 z-[-1] absolute w-full h-full inset-0 pointer-events-none">
                        </div>
                        <div class="w-full h-full flex p-6 lg:p-10 items-center justify-center">
                            <a href="{{ env('LINK_WHATSAPP') }}" class="flex flex-wrap gap-4 lg:gap-6 items-center">
                                <svg class="block h-6 w-6 lg:h-16 lg:w-16 pointer-events-none text-x-white"
                                    fill="currentcolor" viewBox="0 0 308 308">
                                    <path
                                        d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z" />
                                    <path
                                        d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z" />
                                </svg>
                                <h5 class="flex-1 text-x-white font-x-huge text-2xl lg:text-5xl">
                                    {{ env('PHONE_WHATSAPP_NUMBER') }}
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto p-4 -mt-20">
            <ul class="w-full gap-6 lg:gap-10 grid grid-rows-1 grid-cols-1 lg:grid-cols-3">
                <li data-aos="zoom-out-down" data-aos-delay="400"
                    class="flex flex-col gap-2 p-4 bg-x-white rounded-x-huge shadow-x-core border border-x-black border-opacity-10">
                    <h4 class="text-base text-x-black font-x-thin">
                        {{ __('Contact Us via WhatsApp') }}
                    </h4>
                    <p class="text-x-black text-base">
                        {{ __('Have a malfunctioning medical device? Reach out to us easily through WhatsApp. Our dedicated team is available to assist you promptly') }}
                    </p>
                </li>
                <li data-aos="zoom-out-down" data-aos-delay="550"
                    class="flex flex-col gap-2 p-4 bg-x-white rounded-x-huge shadow-x-core border border-x-black border-opacity-10">
                    <h4 class="text-base text-x-black font-x-thin">
                        {{ __('Send Images of the Broken Equipment') }}
                    </h4>
                    <p class="text-x-black text-base">
                        {{ __('Take pictures of the malfunctioning equipment, ensuring to capture the brand and reference details. Send these images to us through WhatsApp') }}
                    </p>
                </li>
                <li data-aos="zoom-out-down" data-aos-delay="700"
                    class="flex flex-col gap-2 p-4 bg-x-white rounded-x-huge shadow-x-core border border-x-black border-opacity-10">
                    <h4 class="text-base text-x-black font-x-thin">
                        {{ __('We Assess and Contact You') }}
                    </h4>
                    <p class="text-x-black text-base">
                        {{ __('Once we receive the images and details, our team will promptly assess the issue. We will then contact you to discuss the problem in more detail and provide further information on the repair process') }}
                    </p>
                </li>
            </ul>
        </div>
    </section>
    <section id="contact">
        <div class="container mx-auto my-6 lg:my-10">
            <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-12 p-4 gap-4 lg:gap-8">
                <div class="w-full flex flex-col gap-6 lg:gap-10 lg:col-span-5">
                    <h2 data-aos="zoom-out"
                        class="text-center lg:text-start text-x-black text-xl lg:text-3xl font-x-huge uppercase">
                        {!! __('You Have A <span class="text-x-core">Question</span>?') !!}<br /> {{ __('Contact Us') }}
                    </h2>
                    <form action="{{ route('actions.guest.contact') }}" method="POST" class="flex flex-col gap-6">
                        @csrf
                        <os-text label="{{ __('Name') }}" name="name" value="{{ old('name') }}"></os-text>
                        <os-text type="email" label="{{ __('Email') }}" name="email"
                            value="{{ old('email') }}"></os-text>
                        <os-text type="tel" label="{{ __('Phone') }}" name="phone"
                            value="{{ old('phone') }}"></os-text>
                        <os-area rows="2" label="{{ __('Message') }}" name="message"
                            value="{{ old('message') }}"></os-area>
                        <os-button
                            class="w-full rounded-x-huge px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-gradient-to-br rtl:bg-gradient-to-bl bg-x-core focus-within:outline-none">
                            {{ __('Send Message') }}
                        </os-button>
                    </form>
                </div>
                <div class="w-full lg:col-span-7 rounded-x-huge bg-x-light h-96 lg:h-full overflow-hidden">
                    <iframe title="health-life-pro-location-map" src="{{ env('LINK_MAPS') }}" width="100%"
                        height="100%" style="border: 0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script defer>
        HomeRunner({{ Core::lang('ar') ? 'true' : 'false' }}, {{ $products->count() ? $products->count() : 'null' }},
            {{ $brands->count() ? $brands->count() : 'null' }});
    </script>
@endsection
