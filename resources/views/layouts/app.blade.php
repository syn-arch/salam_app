<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="/js/app.js"></script>
    <title>@yield('title', 'My Blog')</title>
</head>

<body>

    <x-navbar></x-navbar>

    <div class="container pt-4">
        {{$slot}}
    </div>

    @stack('script')
</body>

</html>
