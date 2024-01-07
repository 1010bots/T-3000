<?php
    use Jenssegers\Agent\Agent;

    $theme_color = $attributes['theme-color'] ?? 'blue';
    $theme_colors = [
        'red' => ['#32120F', '#FFE2DD'],
        'orange' => ['#2F1502', '#FFE7CF'],
        'yellow' => ['#281A00', '#FEEDC9'],
        'lime' => ['#1C2000', '#ECF3CE'],
        'green' => ['#0A230D', '#DAF8DB'],
        'seafoam' => ['#00251C', '#CCFAED'],
        'cyan' => ['#002329', '#C8F9FF'],
        'blue' => ['#002032', '#D0F5FF'],
        'indigo' => ['#111C35', '#DFEFFF'],
        'violet' => ['#1F1732', '#F1E8FF'],
        'purple' => ['#29132A', '#FFE4FF'],
        'fuchsia' => ['#2F111E', '#FFE1EF'],
    ];
    $agent = new Agent();
    $agent->setUserAgent(Request::header('User-Agent'));
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, interactive-widget=resizes-content, viewport-fit=cover">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @isset ($attributes['title'])
            <title>{{ $attributes['title'] }} - {{ config('app.name', 'Laravel') }}</title>
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link rel="preconnect" href="https://fonts.cdnfonts.com" />

        <!-- Scripts -->
        @vite([
            'resources/css/app.css',
            'resources/css/dialog-polyfill.css',
            'resources/js/app.js',
            'resources/js/dialog-polyfill.js',
            'resources/js/modernizr.js',
        ])
        <script src="/js/highlight.min.js"></script>
        <script src="/js/hotkeys.min.js"></script>
        <script src="/js/kakao.min.js"></script>
        <script>hljs.highlightAll();</script>
        <script>Kakao.init('{{ env('KAKAO_JS_KEY', '') }}')</script>

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="/css/bumi-laras-selatan.css"/>

        <!-- Link & Meta Tags -->
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        @isset ($attributes['canonical'])
            <link rel="canonical" href="{{ $attributes['canonical'] }}" />
        @endif
        <style>
            /* For Safari */
            html, body {
                overflow-x: hidden;
                position: relative;
                height: 100%;
            }
            /* * {
                background: #000 !important;
                color: #0f0 !important;
                outline: solid #f00 1px !important;
            } */
        </style>

        <meta name="description" content="{{ $attributes['description'] ?? 'Multitalent Software, Hardware, Life, and Reality Developer' }}" />
        <meta name="keywords" content="{{ $attributes['keywords'] ?? 'reinhart1010,@reinhart1010,Reinhart Previano Koentjoro,Reinhart Previano K,Nate,Shift,Shiftine,Skyborne,Caps,controld,pr0xy,alterine,alt1e,(>_ ),(#_ ),($_ )' }}" />
        <meta name="theme-color" content="{{ $theme_colors[$theme_color][1] }}" media="(prefers-color-scheme: light)">
        <meta name="theme-color" content="{{ $theme_colors[$theme_color][0] }}" media="(prefers-color-scheme: dark)">

        <!-- oEmbed Meta Tags -->
        @if (isset($attributes['oembed']) && $attributes['oembed'] === true)
            <link rel="alternate" type="application/json+oembed" href="{{ env('APP_URL', 'http://127.0.0.1') }}/oembed?url={{ urlencode($attributes['canonical'] ?? url()->full()) }}&format=json" title="{{ $attributes['title'] ?? 'oEmbed Element' }}" />
            <link rel="alternate" type="text/xml+oembed" href="{{ env('APP_URL', 'http://127.0.0.1') }}/oembed?url={{ urlencode($attributes['canonical'] ?? url()->full()) }}&format=xml" title="{{ $attributes['title'] ?? 'oEmbed Element' }}" />
        @endif

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="{{ $attributes['title'] ?? config('app.name', 'Laravel') }}" />
        <meta property="og:type" content="{{ $attributes['og-type'] ?? 'website' }}" />
        <meta property="og:url" content="{{ $attributes['canonical'] ?? url()->full() }}" />
        <meta property="og:image" content="{{ $attributes['og-image'] ?? '/img/hero/main-desktop-light.jpg' }}" />
        <meta property="og:description" content="{{ $attributes['description'] ?? 'Multitalent Software, Hardware, Life, and Reality Developer' }}" />

        @isset ($attributes['og-article-published-time'])
            <meta property="og:article:published_time" content="{{ $attributes['og-article-published-time'] }}" />
        @endisset

        @isset ($attributes['og-article-modified-time'])
            <meta property="og:article:modified_time" content="{{ $attributes['og-article-modified-time'] }}" />
        @endisset

        <!-- Facebook Meta Tags -->
        <meta property="fb:app_id" content="{{ env('FACEBOOK_APP_ID') }}" />
        <meta property="fb:pages" content="100085894570968" />

        <!-- Snapchat Meta Tags -->
        <meta property="snapchat:app_id" content="{{ env('SNAP_APP_ID') }}" />
        <meta property="snapchat:sticker" content="/img/icons/bot-blue-female-neutral.png" />

        <!-- Twitter Meta Tags -->
        <!-- (>_ ): Only necessary non-OG tags, see https://developer.twitter.com/en/docs/twitter-for-websites/cards/guides/getting-started#opengraph -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@reinhart1010" />
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-white dark:bg-black">
            @if (!isset($attributes['navbar']) || $attributes['navbar'] == true)
                @component('navigation-menu', ['theme_color' => $theme_color])
                @endcomponent
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header>
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

        <div class="p-2 pb-safe-offset-2 text-center bg-rc-{{ $theme_color }}-50 dark:bg-rc-{{ $theme_color }}-900 text-black dark:text-white">
            Copyright &copy; Reinhart Previano K. | <a href="https://legal.reinhart1010.id/privacy/general/en" class="font-bold">Privacy Policy</a>
        </div>

        @livewireScripts
    </body>
</html>
