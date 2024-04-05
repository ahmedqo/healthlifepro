@extends('shared.core.base')
@section('title', __('New Brand'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New Brand') }}
        </h1>
        <div class="bg-x-white rounded-x-huge shadow-x-core p-4 lg:p-6">
            <form action="{{ route('actions.brands.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 items-start">
                @csrf
                <div class="lg:col-span-3 w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-5 gap-4 lg:gap-6">
                    <div class="w-full lg:col-start-3">
                        <input id="image-uploader" type="file" name="image" accept="image/*" />
                    </div>
                </div>
                <os-text label="{{ __('Name') }} (en)" name="name_en" value="{{ old('name_en') }}"></os-text>
                <os-text label="{{ __('Name') }} (fr)" name="name_fr" value="{{ old('name_fr') }}"></os-text>
                <os-text label="{{ __('Name') }} (ar)" name="name_ar" value="{{ old('name_ar') }}"></os-text>
                <os-area label="{{ __('Description') }} (en)" name="description_en"
                    value="{{ old('description_en') }}"></os-area>
                <os-area label="{{ __('Description') }} (fr)" name="description_fr"
                    value="{{ old('description_fr') }}"></os-area>
                <os-area label="{{ __('Description') }} (ar)" name="description_ar"
                    value="{{ old('description_ar') }}"></os-area>
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
        Uploader("#image-uploader");
    </script>
@endsection
