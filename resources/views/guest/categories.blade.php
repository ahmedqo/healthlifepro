@extends('shared.guest.base')
@section('title', __('Categories List'))

@section('content')
    <section id="hero" style="background-image: url({{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full isolate bg-gray-800 bg-cover bg-no-repeat relative bg-center">
        <div class="absolute inset-0 w-full h-full bg-x-black bg-opacity-40 backdrop-blur-sm z-[-1]"></div>
        <div class="w-full p-4 container mx-auto min-h-[6rem] aspect-[5/1] flex items-center justify-center">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl">
                {{ __('Categories List') }}
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
        <section id="categories">
            <div class="container mx-auto p-4 flex flex-col gap-4">
                <ul class="grid grid-rows-1 grid-cols-2 lg:grid-cols-4 gap-4">
                    @forelse ($data as $row)
                        <li>
                            <a href="{{ route('views.guest.products', [
                                'category' => $row->slug,
                            ]) }}"
                                class="aspect-[16/12] w-full shadow-x-core rounded-x-huge border border-x-black border-opacity-10 overflow-hidden flex items-center justify-center bg-x-white">
                                <img src="{{ $row->Image }}" alt="{{ $row->slug }}-image"
                                    class="block w-full h-full object-cover object-center transition-transform duration-150 hover:scale-150" />
                            </a>
                            <div class="p-2">
                                <h3 style="-webkit-line-clamp: 2"
                                    class="truncate-x-core text-x-core text-sm lg:text-base font-x-huge text-x-black flex-1 text-center">
                                    {{ $row->name }}
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
            </div>
        </section>
    </div>
@endsection
