<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-flash-message/> {{--flash Message(popup when course is created) --}}
<body class="body">  
    @include('partials._navbar')
    @include('partials._search')
    {{$slot}}
    @include('partials._footer')
</body>
</html>