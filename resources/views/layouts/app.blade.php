<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @isset ($attributes['title'])
            <title>{{ $attributes['title'] }} - {{ config('app.name', 'Laravel') }}</title>
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- Scripts -->
        @vite([
            'resources/css/app.css',
            'resources/css/dialog-polyfill.css',
            'resources/js/app.js',
            'resources/js/dialog-polyfill.js',
            'resources/js/highlight.min.js',
            'resources/js/modernizr.js',
        ])
        <script>hljs.highlightAll();</script>

        <!-- Styles -->
        @livewireStyles

        <!-- Meta Tags -->
        @isset ($attributes['canonical'])
            <link rel="canonical" href="{{ $attributes['canonical'] }}" />
        @endif
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
