@extends('shared.core.base')
@section('title', __('Edit Catalog') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Edit Catalog') . ' #' . $data->id }}
        </h1>
        <div class="bg-x-white rounded-x-huge shadow-x-core p-4 lg:p-6">
            <form action="{{ route('actions.catalogs.patch', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 items-start">
                @csrf
                @method('patch')
                <div class="lg:col-span-3 w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-4 lg:gap-6">
                    <div class="w-full lg:col-start-3">
                        <input id="image-uploader" type="file" name="image" accept="image/*"
                            data-target=".uploader-item" />
                        <button type="button"
                            class="uploader-item bg-x-white w-full group aspect-square rounded-x-thin flex items-center justify-center cursor-pointer overflow-hidden absolute inset-0">
                            <img class="w-full h-full object-contain pointer-events-none transition-transform group-hover:scale-150"
                                src="{{ $data->Image }}">
                            <div
                                class="bg-x-black text-x-white opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity w-full h-full absolute inset-0 bg-opacity-[.025] flex items-center justify-center">
                                <svg fill="currentcolor" viewBox="0 96 960 960" class="block w-20 h-20 pointer-events-none">
                                    <path
                                        d="m480 647 88 88q10.733 12 28.367 12 17.633 0 30.459-11.826Q638 724 638 706.25T627 677l-88-89 88-90q11-11.733 11-29.367 0-17.633-11.174-28.459Q615 429 597.367 428.5 579.733 428 569 440l-89 89-87-89q-10.5-12-28.75-11.5t-30.424 11.674Q322 452 322 469.133q0 17.134 12 28.867l88 90-88 88q-11 12.5-11 29.75t10.826 29.424Q346 747 363.75 747T393 735l87-88ZM253 957q-35.725 0-63.863-27.138Q161 902.725 161 866V314h-11q-19 0-31.5-12.5T106 268q0-19 12.5-32t31.5-13h182q0-20 13-33.5t33-13.5h204q20 0 33.5 13.3T629 223h180q20 0 33 13t13 32q0 21-13 33.5T809 314h-11v552q0 36.725-27.638 63.862Q742.725 957 706 957H253Z">
                                    </path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <input id="document-uploader" type="file" name="file" accept="application/pdf" class="hidden" />
                <os-text id="document" label="{{ __('Document') }}" value="{{ $data->document }}"
                    class="lg:col-span-3"></os-text>
                <os-text label="{{ __('Name') }} (en)" name="name_en" value="{{ $data->name_en }}"></os-text>
                <os-text label="{{ __('Name') }} (fr)" name="name_fr" value="{{ $data->name_fr }}"></os-text>
                <os-text label="{{ __('Name') }} (ar)" name="name_ar" value="{{ $data->name_ar }}"></os-text>
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
        CatalogMaker();
    </script>
@endsection
