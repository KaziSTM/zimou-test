@extends('components.templates.base')

@section('body')
    <section class="relative h-screen py-8 bg-gray-900 sm:py-10 lg:py-12 dark:bg-gray-800">
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-primary-500 via-secondary-800 to-secondary-900 dark:from-primary-600 dark:via-secondary-700 dark:to-secondary-800">
        </div>

        @yield('content')

        @isset($slot)
            <div class="relative max-w-lg px-4 mx-auto sm:px-0">
                <div class="overflow-hidden bg-white dark:bg-gray-700 rounded-md shadow-md dark:shadow-lg">
                    {{ $slot }}
                </div>
            </div>
        @endisset
    </section>
@endsection
