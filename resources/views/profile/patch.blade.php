@extends('shared.core.base')
@section('title', __('Edit Profile'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Edit Profile') }}
        </h1>
        <div class="bg-x-white rounded-x-huge shadow-x-core p-4 lg:p-6">
            <form action="{{ route('actions.profile.patch') }}" method="POST"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-6">
                @csrf
                @method('patch')
                <os-text label="{{ __('First Name') }}" name="first_name" value="{{ $data->first_name }}"
                    class="lg:col-span-2"></os-text>
                <os-text label="{{ __('Last Name') }}" name="last_name" value="{{ $data->last_name }}"
                    class="lg:col-span-2"></os-text>
                <os-select label="{{ __('Gender') }}" name="gender" class="lg:col-span-2">
                    @foreach (Core::gender() as $gender)
                        <os-option value="{{ $gender }}" {{ $gender == $data->gender ? 'selected' : '' }}>
                            {{ ucwords(__($gender)) }}
                        </os-option>
                    @endforeach
                </os-select>
                <os-date {{ !Core::lang('ar') ? 'full-day=3' : '' }} label="{{ __('Birth Date') }}" name="birth_date"
                    format="dddd dd MMMM yyyy" value="{{ $data->birth_date }}" class="lg:col-span-2"></os-date>
                <os-text type="email" label="{{ __('Email') }}" name="email" value="{{ $data->email }}"
                    class="lg:col-span-2"></os-text>
                <os-text type="tel" label="{{ __('Phone') }}" name="phone" value="{{ $data->phone }}"
                    class="lg:col-span-2"></os-text>
                <os-area label="{{ __('Address') }}" name="address" value="{{ $data->address }}"
                    class="lg:col-span-4"></os-area>
                <div class="w-full flex lg:col-span-4">
                    <os-button
                        class="w-full lg:w-max lg:px-20 lg:ms-auto rounded-x-huge px-4 py-2 text-base lg:text-lg font-x-huge text-x-white">
                        <span>{{ __('Save') }}</span>
                    </os-button>
                </div>
            </form>
        </div>
    </div>
@endsection
