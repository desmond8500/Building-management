<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API</title>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@latest/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
</head>

<body class="antialiased">
    <div class="wrapper">
        @livewire('tabler.navbar')
        <div class="page-wrapper">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@tabler/core@latest/dist/js/tabler.min.js"></script>
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
    <script>
        mermaid.initialize({startOnLoad:true});
    </script>

    @stack('scripts')
</body>

</html>
