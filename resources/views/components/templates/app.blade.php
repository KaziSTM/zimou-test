@extends('components.templates.base')

@section('body')
    <div x-data="{ open: false }" @keydown.window.escape="open = false"
         class="flex flex-col min-h-screen dark:bg-gray-900 bg-white">
        <x-organisms.navbar/>
        <div class="flex flex-1">
            <x-organisms.sidebar/>
            <div class="flex items-stretch flex-1 overflow-hidden bg-slate-50 dark:bg-slate-700">
                <main class="flex flex-1 overflow-y-auto">
                    <div class="w-full p-10 space-y-10 overflow-auto dark:text-gray-300">
                        @yield('content')
                        @isset($slot)
                            {{ $slot }}
                        @endisset
                    </div>
                </main>
            </div>
        </div>
    </div>
