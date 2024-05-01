@extends('shared.guest.base')
@section('title', __('Contact'))

@section('content')
    <section id="hero" style="background-image: url({{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full isolate bg-gray-800 bg-cover bg-no-repeat relative bg-center">
        <div class="absolute inset-0 w-full h-full bg-x-black bg-opacity-40 backdrop-blur-sm z-[-1]"></div>
        <div class="w-full p-4 container mx-auto min-h-[6rem] aspect-[5/1] flex items-center justify-center">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl">
                {{ __('Contact') }}
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
        <section id="about">
            <div class="container items-center mx-auto p-4 grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10">
                <div class="rounded-x-huge overflow-hidden aspect-[16/8]">
                    <img src="{{ asset('img/about.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-about-image"
                        class="block w-full h-full object-cover object-center" />
                </div>
                <div class="w-full flex flex-col gap-4">
                    <h2 class="text-base lg:text-lg font-x-thin text-x-black -mb-3">{{ __('About') }}</h2>
                    <h1 class="text-x-core text-2xl lg:text-4xl font-x-huge uppercase">
                        {{ __('HEALTH LIFE PRO') }}
                    </h1>
                    <p class="text-x-black text-base">
                        {{ __('It distinguishes itself as an expert in the supply of medical equipment, catering to both healthcare professionals and individuals') }}
                    </p>
                    <p class="text-x-black text-base">
                        {{ __('We proceed with the selection and distribution of products from the most eminent brands, offering you the opportunity to practice your profession or take care of your health with the best equipment, all at advantageous rates') }}
                    </p>
                </div>
            </div>
        </section>
        <section id="contact" class="lg:my-6">
            <div class="container mx-auto">
                <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-12 p-4 gap-4 lg:gap-8">
                    <div class="w-full flex flex-col gap-6 lg:gap-10 lg:col-span-5">
                        <h2 class="text-center lg:text-start text-x-black text-xl lg:text-3xl font-x-huge uppercase">
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
        <section id="info">
            <div class="container items-center mx-auto p-4 grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10">
                <div class="rounded-x-huge overflow-hidden aspect-[16/8]">
                    <img src="{{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }}" alt="health-life-pro-about-image"
                        class="block w-full h-full object-cover object-center" />
                </div>
                <ul class="w-full flex flex-col gap-6">
                    <li class="flex flex-wrap gap-4">
                        <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M480.722-61q-85.884 0-162.376-33.082-76.493-33.083-133.86-90.081-57.367-56.998-90.427-133.618Q61-394.4 61-480.2q0-85.8 33.03-162.149t90.366-133.388q57.337-57.039 134.147-90.651Q395.352-900 481.369-900q86.016 0 162.715 33.477t133.274 90.54q56.576 57.062 89.609 133.609Q900-565.828 900-479.914t-32.802 162.375q-32.802 76.462-89.748 133.584-56.946 57.122-134.077 90.039Q566.243-61 480.722-61ZM439-153v-80q-35 0-57.435-24.62-22.435-24.621-22.435-59.338v-42.657L162-557q-5 18.474-7 37.448t-2 37.981q0 123.241 81 219.906T439-153Zm284-104q20.286-22.287 36.62-49.145 16.334-26.857 27.054-55.282 10.719-28.425 16.022-58.165Q808-449.331 808-481.855q0-100.702-55.593-184.469Q696.815-750.091 604-788v16.327q0 34.436-22.909 58.554Q558.181-689 522.836-689H439v84.701Q439-586 426.5-576.5t-31.799 9.5H316v85h249.624q15.542 0 26.959 12.713Q604-456.575 604-440.745V-317h39.788q27.212 0 49.632 16.777Q715.84-283.446 723-257Z" />
                        </svg>
                        <div class="w-0 flex-1 flex flex-col">
                            <a href="{{ env('LINK_MAP') }}" class="w-full text-x-black text-base font-x-thin">
                                {{ env('ADDRESS_LOCATION') }}
                            </a>
                        </div>
                    </li>
                    <li class="flex flex-wrap gap-4">
                        <ul class="w-full grid grid-rows-1 grid-cols-1 md:grid-cols-2 gap-4" style="row-gap: 0.25rem">
                            <li class="flex flex-wrap gap-4 items-center">
                                <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M264-247q-37.587 0-64.794-27.119Q172-301.237 172-339v-429q0-37.588 27.206-64.794Q226.413-860 264-860h584q37.175 0 64.088 27.206Q939-805.588 939-768v429q0 37.763-26.912 64.881Q885.175-247 848-247H264Zm292-214L264-699v360h584v-360L556-461Zm0-75 287-232H269l287 232ZM112-96q-37.125 0-64.063-27.094Q21-150.188 21-187v-550h91v550h718v91H112Zm736-602v-70H264v70-70h584v70Z" />
                                </svg>
                                <a href="mailto:{{ env('MAIL_CONTACT_ADDRESS') }}"
                                    class="w-0 flex-1 text-x-black text-base font-x-thin break-words">
                                    {{ env('MAIL_CONTACT_ADDRESS') }}
                                </a>
                            </li>
                            @foreach (explode(';', env('MAIL_PERSONAL_ADDRESS')) as $mail)
                                <li class="flex flex-wrap gap-4 items-center">
                                    <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor"
                                        viewBox="0 -960 960 960">
                                        <path
                                            d="M264-247q-37.587 0-64.794-27.119Q172-301.237 172-339v-429q0-37.588 27.206-64.794Q226.413-860 264-860h584q37.175 0 64.088 27.206Q939-805.588 939-768v429q0 37.763-26.912 64.881Q885.175-247 848-247H264Zm292-214L264-699v360h584v-360L556-461Zm0-75 287-232H269l287 232ZM112-96q-37.125 0-64.063-27.094Q21-150.188 21-187v-550h91v550h718v91H112Zm736-602v-70H264v70-70h584v70Z" />
                                    </svg>
                                    <a href="mailto:{{ $mail }}"
                                        class="w-0 flex-1 text-x-black text-base font-x-thin break-words">
                                        {{ $mail }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="flex flex-wrap gap-4">
                        <ul class="w-full grid grid-rows-1 grid-cols-1 md:grid-cols-2 gap-4" style="row-gap: 0.25rem">
                            <li class="flex flex-wrap gap-4 items-center">
                                <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor" viewBox="0 0 48 48">
                                    <path
                                        d="M39.6 42.95q-6.25 0-12.45-3.075-6.2-3.075-11.125-7.975-4.925-4.9-8-11.15T4.95 8.35q0-1.4 1-2.425T8.4 4.9h6.75q1.6 0 2.575.8.975.8 1.275 2.35l1.35 5.3q.2 1.4-.1 2.375-.3.975-1.1 1.675L14 22.1q2.5 3.95 5.45 6.825T26 33.85l4.95-4.95q.85-.9 1.9-1.25 1.05-.35 2.35-.05l4.7 1.15q1.55.4 2.35 1.425t.8 2.525v6.75q0 1.5-1 2.5t-2.45 1Z" />
                                </svg>
                                <a href="tel:{{ env('PHONE_CONTACT_NUMBER') }}"
                                    class="w-0 flex-1 text-x-black text-base font-x-thin">
                                    {{ env('PHONE_CONTACT_NUMBER') }}
                                </a>
                            </li>
                            <li class="flex flex-wrap gap-4 items-center">
                                <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor" viewBox="0 0 48 48">
                                    <path
                                        d="M39.6 42.95q-6.25 0-12.45-3.075-6.2-3.075-11.125-7.975-4.925-4.9-8-11.15T4.95 8.35q0-1.4 1-2.425T8.4 4.9h6.75q1.6 0 2.575.8.975.8 1.275 2.35l1.35 5.3q.2 1.4-.1 2.375-.3.975-1.1 1.675L14 22.1q2.5 3.95 5.45 6.825T26 33.85l4.95-4.95q.85-.9 1.9-1.25 1.05-.35 2.35-.05l4.7 1.15q1.55.4 2.35 1.425t.8 2.525v6.75q0 1.5-1 2.5t-2.45 1Z" />
                                </svg>
                                <a href="tel:{{ env('PHONE_WHATSAPP_NUMBER') }}"
                                    class="w-0 flex-1 text-x-black text-base font-x-thin">
                                    {{ env('PHONE_WHATSAPP_NUMBER') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>
    </div>
@endsection
