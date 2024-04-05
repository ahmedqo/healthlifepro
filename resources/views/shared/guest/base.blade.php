<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Core::lang('ar') ? 'rtl' : 'ltr' }}"
    class="scroll-smooth w-full overflow-x-hidden">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('title')" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @include('shared.base.styles')
    <title>@yield('title')</title>
</head>

<body close class="w-full overflow-x-hidden">
    <os-wrapper>
        @include('shared.guest.header')
        <main>
            @yield('content')
        </main>
        @include('shared.guest.footer')
        <os-toaster position="end, start"></os-toaster>
    </os-wrapper>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @include('shared.base.scripts')
    @yield('scripts')
    <script>
        BaseIntializer();
        AOS.init({
            once: true,
            offset: 0,
        });
    </script>
</body>

</html>
