@extends('shared.core.base')
@section('title', __('New Product'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New Product') }}
        </h1>
        <div class="bg-x-white rounded-x-huge shadow-x-core p-4 lg:p-6">
            <form action="{{ route('actions.products.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 items-start">
                @csrf
                <div class="lg:col-span-3 w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
                    <input type="hidden" name="brand" value="{{ old('brand') }}" />
                    <os-filter id="brand" label="{{ __('Brand') }}" name="brand_text"
                        value="{{ old('brand_text') }}"></os-filter>
                    <input type="hidden" name="category" value="{{ old('category') }}" />
                    <os-filter id="category" label="{{ __('Category') }}" name="category_text"
                        value="{{ old('category_text') }}"></os-filter>
                    <os-text label="{{ __('Reference') }}" name="reference" value="{{ old('reference') }}"></os-text>
                    <os-text type="number" label="{{ __('Price') }}" name="price"
                        value="{{ old('price') }}"></os-text>
                </div>
                <os-text label="{{ __('Name') }} (en)" name="name_en" value="{{ old('name_en') }}"></os-text>
                <os-text label="{{ __('Name') }} (fr)" name="name_fr" value="{{ old('name_fr') }}"></os-text>
                <os-text label="{{ __('Name') }} (ar)" name="name_ar" value="{{ old('name_ar') }}"></os-text>
                <os-area label="{{ __('Details') }} (en)" name="details_en" value="{{ old('details_en') }}"></os-area>
                <os-area label="{{ __('Details') }} (fr)" name="details_fr" value="{{ old('details_fr') }}"></os-area>
                <os-area label="{{ __('Details') }} (ar)" name="details_ar" value="{{ old('details_ar') }}"></os-area>
                <div class="w-full lg:col-span-3">
                    <input id="image-uploader" type="file" name="images[]" accept="image/*" multiple />
                </div>
                <textarea id="description_en" name="description_en" placeholder="{{ __('Description') }} (en)" rows="3">{{ old('description_en') }}</textarea>
                <textarea id="description_fr" name="description_fr" placeholder="{{ __('Description') }} (fr)" rows="3">{{ old('description_fr') }}</textarea>
                <textarea id="description_ar" name="description_ar" placeholder="{{ __('Description') }} (ar)" rows="3">{{ old('description_ar') }}</textarea>
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
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script>
        ProductEditor({
            lang: "{{ app()->getLocale() }}",
            uploader: "#image-uploader",
            editors: ["#description_en", "#description_fr", "#description_ar"]
        });
    </script>
@endsection
