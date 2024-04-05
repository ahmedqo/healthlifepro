@extends('shared.guest.base')
@section('title', __('Products List'))

@section('content')
    <section id="hero" style="background-image: url({{ asset('img/shapes.webp') }}?v={{ env('APP_VERSION') }})"
        class="w-full isolate bg-gray-800 bg-cover bg-no-repeat relative bg-center">
        <div class="absolute inset-0 w-full h-full bg-x-black bg-opacity-40 backdrop-blur-sm z-[-1]"></div>
        <div class="w-full p-4 container mx-auto min-h-[6rem] aspect-[5/1] flex items-center justify-center">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl">
                {{ __('Products List') }}
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
        <section id="products">
            <div class="container mx-auto p-4 flex flex-col gap-4">
                <div class="grid grid-rows-1 grid-cols-1 lg:grid-cols-4 gap-4">
                    @include('shared.guest.categories', [
                        'categories' => $categories,
                    ])
                    <div class="w-full flex flex-col lg:col-span-3 gap-4">
                        @if (request()->search)
                            <h3 class="w-full col-span-2 lg:col-span-3 text-x-black font-x-huge text-lg lg:text-xl">
                                {{ __('Search') }}: {{ request()->search }}
                            </h3>
                        @endif
                        <ul class="grid grid-rows-1 grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse ($data as $row)
                                <li
                                    class="p-4 gap-2 flex flex-col rounded-x-huge border border-x-black border-opacity-10 bg-x-white">
                                    <div
                                        class="w-full aspect-[16/12] rounded-x-huge overflow-hidden shadow-x-core bg-white">
                                        <img src="{{ $row->Images[0]->Url }}" alt="{{ $row->slug }}-image"
                                            class="block w-full h-full object-cover object-center transition-transform duration-150 hover:scale-150" />
                                    </div>
                                    <h3 style="-webkit-line-clamp: 2"
                                        class="truncate-x-core text-sm lg:text-base font-x-huge text-x-black flex-1 text-center">
                                        {{ $row->name }}
                                    </h3>
                                    <a href="{{ route('views.guest.details', $row->slug) }}"
                                        class="text-sm lg:text-base mx-auto mt-2 w-max block font-x-thin text-x-prime">
                                        {{ __('view') }}
                                    </a>
                                </li>
                            @empty
                                <li class="col-span-2 lg:col-span-3">
                                    <h4 class="text-xl lg:text-2xl text-center px-4 py-10 text-x-black font-x-huge">
                                        {{ __('NO DATA FOUND') }}
                                    </h4>
                                </li>
                            @endforelse
                        </ul>
                        <nav class="col-span-2 lg:col-span-3 flex items-center justify-between gap-4">
                            {{ $data->appends(request()->input())->links('shared.base.paginate') }}
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
