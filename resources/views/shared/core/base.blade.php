<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Core::lang('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('shared.base.styles')
    <title>@yield('title')</title>
    <style>
        .no-show {
            display: none;
        }
    </style>
</head>

<body close>
    <os-wrapper class="bg-x-black bg-opacity-[.08]">
        @include('shared.core.topbar')
        @include('shared.core.sidebar')
        <main class="p-4 container mx-auto">
            @yield('content')
        </main>
        <os-toaster position="end, start"></os-toaster>
    </os-wrapper>
    @include('shared.base.scripts')
    <script>
        // Print.opts.margin = "0mm 0mm 0mm 0mm";
        Print.opts.css = [
            `<link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ env('APP_VERSION') }}" />`,
            `<link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ env('APP_VERSION') }}" />`,
        ];
    </script>
    @yield('scripts')
</body>

</html>
