@extends('shared.guest.base')
@section('title', __('Terms And Conditions'))

@section('content')
    <section id="hero" style="background-image: url({{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full isolate bg-gray-800 bg-cover bg-no-repeat relative bg-center">
        <div class="absolute inset-0 w-full h-full bg-x-black bg-opacity-40 backdrop-blur-sm z-[-1]"></div>
        <div class="w-full p-4 container mx-auto min-h-[6rem] aspect-[5/1] flex items-center justify-center">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl">
                {{ __('Terms And Conditions') }}
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
        <section id="terms">
            <div class="container mx-auto p-4">
                <ul class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Acceptance of Terms') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('By accessing or using our website, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('These terms may be updated from time to time, and it is your responsibility to check for updates. Your continued use of the website after any changes constitutes acceptance of those changes') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Use of the Website') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('You agree to use this website for lawful purposes and in a manner that does not infringe on the rights of any third party or restrict or inhibit their use and enjoyment of the website') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('You shall not use the website in any way that could damage, disable, overburden, or impair any aspect of our website') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Product Information') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('While we strive to provide accurate product information on our website, we do not warrant the accuracy, completeness, or reliability of any product information') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('Prices, product descriptions, and availability are subject to change without notice') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Orders and Payments') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Placing an order on our website constitutes an offer to purchase the products') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('We reserve the right to refuse or cancel any order for any reason at any time') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('All payments are due upon completion of the order') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Limitation of Liability') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('To the extent permitted by law, HEALTH LIFE PRO shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising out of your use of, or inability to use, the website or the materials on the website') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Governing Law') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('These Terms and Conditions shall be governed by and construed in accordance with the laws of Morocco') }}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
@endsection
