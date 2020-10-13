<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

</head>
<!-- 👀 Nothing to see here, just an empty alpine component  -->
<body class="font-sans antialiased" x-data="{}">
    <div class="min-h-screen flex flex-col justify-between space-y-10">

            {{ $slot }}
        
    </div>



    @livewireScripts
</body>

</html>
