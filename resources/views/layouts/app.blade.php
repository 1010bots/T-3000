<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
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

        <!-- Link & Meta Tags -->
        @isset ($attributes['canonical'])
            <link rel="canonical" href="{{ $attributes['canonical'] }}" />
        @endif
        
        <meta name="description" href="{{ $attributes['description'] ?? 'Multitalent Software, Hardware, Life, and Reality Developer' }}" />
        <meta name="keywords" href="{{ $attributes['keywords'] ?? 'reinhart1010,@reinhart1010,Reinhart Previano Koentjoro,Reinhart Previano K,Nate,Shift,Shiftine,Skyborne,Caps,controld,pr0xy,alterine,alt1e,(>_ ),(#_ ),($_ )' }}" />

        <!-- oEmbed Meta Tags -->
        @if (isset($attributes['oembed']) && $attributes['oembed'] === true)
            <link rel="alternate" type="application/json+oembed" href="{{ env('APP_URL', 'http://127.0.0.1') }}/oembed?url={{ urlencode($attributes['canonical'] ?? url()->full()) }}&format=json" title="{{ $attributes['title'] ?? 'oEmbed Element' }}" />
            <link rel="alternate" type="text/xml+oembed" href="{{ env('APP_URL', 'http://127.0.0.1') }}/oembed?url={{ urlencode($attributes['canonical'] ?? url()->full()) }}&format=xml" title="Bacon Lollys oEmbed Profile" />
        @endif

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="{{ $attributes['title'] ?? config('app.name', 'Laravel') }}" />
        <meta property="og:type" content="{{ $attributes['og-type'] ?? 'website' }}" />
        <meta property="og:url" content="{{ $attributes['canonical'] ?? url()->full() }}" />
        <meta property="og:image" content="{{ $attributes['og-image'] ?? '/img/hero/main-desktop-light.jpg' }}" />

        @isset ($attributes['og-article-published-time'])
            <meta property="og:article:published_time" content="{{ $attributes['og-article-published-time'] }}" />
        @endisset

        @isset ($attributes['og-article-modified-time'])
            <meta property="og:article:modified_time" content="{{ $attributes['og-article-modified-time'] }}" />
        @endisset

        <!-- Facebook Meta Tags -->
        <meta name="fb:page_id" content="100085894570968" />

        <!-- Twitter Meta Tags -->
        <!-- (>_ ): Only necessary non-OG tags, see https://developer.twitter.com/en/docs/twitter-for-websites/cards/guides/getting-started#opengraph -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@reinhart1010" />
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @if (!isset($attributes['navbar']) || $attributes['navbar'] == true)
                @livewire('navigation-menu')
            @endif

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
