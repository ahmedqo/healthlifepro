<script src="{{ asset('js/os.js') }}?v={{ env('APP_VERSION') }}"></script>
<script src="{{ asset('js/index.js') }}?v={{ env('APP_VERSION') }}"></script>
@if (Session::has('message'))
    @php
        $messages = is_array(Session::get('message')) ? Session::get('message') : [Session::get('message')];
    @endphp
    <script>
        OS.Load(function() {
            @foreach ($messages as $message)
                OS.$Toaster.Toast("{{ $message }}", "{{ Session::get('type') }}");
            @endforeach
        });
    </script>
@endif
