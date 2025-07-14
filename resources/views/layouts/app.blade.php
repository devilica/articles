<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>


    <title>Articles</title>
    @livewireStyles


</head>

<body>
    <x-lang-switcher />

    <div id="app">
        @yield('content')
    </div>

    @livewireScripts
</body>

</html>
