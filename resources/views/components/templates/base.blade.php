<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="soft-scrollbar"
    x-data="tallstackui_darkTheme()"
    x-bind:class="{ 'dark bg-gray-800 text-white': darkTheme, 'bg-white text-black': !darkTheme }">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}">
    <tallstackui:script/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased tracking-tight">
<x-dialog/>
<x-toast/>
@yield('body')
</body>
</html>

