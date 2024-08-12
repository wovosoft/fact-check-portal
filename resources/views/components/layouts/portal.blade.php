<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<!-- Navigation Bar -->
<nav class="bg-blue-600 p-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="{{route('dashboard')}}" class="text-white text-lg font-bold">
            Fact Check
        </a>
        <ul class="flex space-x-4">
            <li><a href="#" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Home</a></li>
            <li><a href="#" class="text-white hover:bg-blue-700 px-3 py-2 rounded">About</a></li>
            <li><a href="#" class="text-white hover:bg-blue-700 px-3 py-2 rounded">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Banner -->
<header class="bg-blue-500 text-white py-10">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl font-bold">
            {{$banner??'Open Source Fact Checking Portal'}}
        </h1>
        <p class="mt-2 text-lg">
            Information are collected from Online Sources
        </p>
    </div>
</header>

{{$slot}}

@filamentScripts
</body>
</html>
