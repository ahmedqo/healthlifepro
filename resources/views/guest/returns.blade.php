@extends('shared.guest.base')
@section('title', __('Return Policy'))

@section('content')
    <section id="hero" style="background-image: url({{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full isolate bg-gray-800 bg-cover bg-no-repeat relative bg-center">
        <div class="absolute inset-0 w-full h-full bg-x-black bg-opacity-40 backdrop-blur-sm z-[-1]"></div>
        <div class="w-full p-4 container mx-auto min-h-[6rem] aspect-[5/1] flex items-center justify-center">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl">
                {{ __('Return Policy') }}
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
                            {{ __('Eligibility') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('We accept returns within 30 days of the purchase date') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('To be eligible for a return, the item must be unused, in its original packaging, and in the same condition as received') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Return Authorization') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Our customer service team will provide you with a Return Authorization (RA) number and instructions on how to return the item') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Packaging') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Please ensure the item is securely packaged to prevent damage during transit') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Return Address') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Ship the item to the address provided along with the RA number') }}
                            </p>
                            <p class="text-base text-x-black">
                                {{ __('The cost of return shipping is the responsibility of the customer unless the return is due to an error on our part') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Refund Processing') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Once we receive the returned item, we will inspect it and process the refund within 10 business days') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Payment Method') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Refunds will be issued to the original payment method used for the purchase') }}
                            </p>
                        </div>
                    </li>
                    <li class="flex flex-col gap-2 lg:gap-3">
                        <h3 class="text-base text-x-black font-x-thin">
                            {{ __('Shipping Costs') }}
                        </h3>
                        <div class="w-full flex flex-col gap-1 lg:gap-2">
                            <p class="text-base text-x-black">
                                {{ __('Original shipping costs are non-refundable unless the return is due to an error on our part') }}
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
@endsection
