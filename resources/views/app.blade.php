<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Livewire</title>

    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
</head>
<body>
    @include('layouts.navbar')
    
    <div class="py-4">
        <livewire:show-posts />
    </div>

    <script src="/js/app.js"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <x-livewire-alert::scripts />
</body>
</html>