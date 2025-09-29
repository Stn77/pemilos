<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/font/font.css')}}">
    <link rel="stylesheet" href="{{asset('assets/mdi/css/materialdesignicons.css')}}">

</head>
<body class="bg-slate-300">
    {{-- <x-navbar></x-navbar> --}}
    <x-user-logout></x-user-logout>
    @livewire('bilik-suara')
</body>
</html>