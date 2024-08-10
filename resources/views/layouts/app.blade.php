<?php
    use Jenssegers\Agent\Agent;

    $theme_color = $attributes['theme-color'] ?? 'blue';
    $theme_scheme = $attributes['theme-scheme'] ?? 'auto';
    $was_dark = false;
    if (isset($_COOKIE['r10-current-auto-theme'])) {
        $was_dark = $_COOKIE['r10-current-auto-theme'] == 'dark';
    }
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
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/kakao.min.js"></script>
        <script>hljs.highlightAll();</script>
        <script>
            // For GNU LibreJS
            // @license magnet:?xt=urn:btih:d3d9a9a6595521f9666a5e94cc830dab83b65699&dn=expat.txt Expat License (sometimes called MIT Licensed)
            console.log("(#_ )! The Kakao.js script is loaded, but from our cached version at https://reinhart1010.id/js/kakao.min.js");
            Kakao.init("{{ env('KAKAO_JS_KEY', '') }}");
            // @license-end
        </script>

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="/css/bumi-laras-selatan.css"/>

        <!-- Link & Meta Tags -->
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        @isset ($attributes['canonical'])
            <link rel="canonical" href="{{ $attributes['canonical'] }}" />
        @endif
        @if ($agent->isSafari())
            <style>
                /* For Safari */
                html, body {
                    overflow-x: hidden;
                    position: relative;
                    height: 100%;
                }
            </style>
        @endif
        <style>
            /* * {
                background: #000 !important;
                color: #0f0 !important;
                outline: solid #f00 1px !important;
            } */
        </style>

        <meta name="description" content="{{ $attributes['description'] ?? 'Tech Developer x Hacker x Designer x Manager x Investor x Artist x Preacher.' }}" />
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
        <meta property="og:image" content="{{ $attributes['og-image'] ?? 'https://blogarchive.reinhart1010.id/wp-content/uploads/2024/03/A841F65E-5D64-4D24-AD0C-986286C921A0.webp' }}" />
        <meta property="og:description" content="{{ $attributes['description'] ?? 'Tech Developer x Hacker x Designer x Manager x Investor x Artist x Preacher.' }}" />

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

        <!-- JSON-LD -->
        @isset ($attributes['json-ld'])
            <script type="application/ld+json">
                {!! json_encode($attributes['json-ld']) !!}
            </script>
        @endif

        <!-- rel="me" links for profile verification -->
        <link rel="me" href="https://botsin.space/@reinhart1010" />
        <link rel="me" href="https://bsky.app/profile/shiftine.reinhart1010.id" />
        <link rel="me" href="https://codeberg.org/1010bots" />
        <link rel="me" href="https://github.com/1010bots" />
        <link rel="me" href="https://github.com/alterine0101" />
        <link rel="me" href="https://github.com/shiftinecmd" />
        <link rel="me" href="https://gitlab.com/1010bots" />
        <link rel="me" href="https://kenangan.com/kenanganku/shiftinecmd" />
        <link rel="me" href="https://logs.reinhart1010.id/@shiftine" />
        <link rel="me" href="https://misskey.id/@1010bots" />
        <link rel="me" href="https://social.vivaldi.net/@reinhart1010" />
        <link rel="me" href="https://twitter.com/alterine0101" />
        <link rel="me" href="https://twitter.com/capsinthehouse" />
        <link rel="me" href="https://twitter.com/reinhart1010" />
    </head>
    <body class="font-sans antialiased bg-white dark:bg-black {{ ($theme_scheme == "dark" || $was_dark) ? "dark" : ""; }}">
        <x-banner />

        <div class="flex flex-col min-h-screen bg-white dark:bg-black">
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
            <main class="flex-grow">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <hr class="border-dm-{{ $theme_color }}-300" />
        <div class="p-4 px-safe-offset-4 grid grid-cols-1 sm:grid-cols-2 gap-3 bg-rc-{{ $theme_color }}-50/25 dark:bg-rc-{{ $theme_color }}-900/25 text-black dark:text-white">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-3">
                    <picture>
                        <source srcset="/img/icons/shell-blue-male-neutral.avif" type="image/avif">
                        <source srcset="/img/icons/shell-blue-male-neutral.heic" type="image/heic">
                        <source srcset="/img/icons/shell-blue-male-neutral.webp" type="image/webp">
                        <source srcset="/img/icons/shell-blue-male-neutral.jp2" type="image/jp2">
                        <source srcset="/img/icons/shell-blue-male-neutral.png" type="image/png">
                        <img alt="Reinhart Previano Koentjoro" src="/img/icons/shell-blue-male-neutral.png" height="668" width="691" style="height: 4rem; width: auto;">
                    </picture>
                    <h6 class="text-2xl font-semibold">Reinhart Previano Koentjoro</h6>
                </div>
                <!-- TODO: Refactor this into a dedicated component -->
                <x-primitives.card :theme-color="$theme_color" class="flex flex-col p-3 gap-3 rounded-xl">
                    <p class="text-xl font-medium">Personal</p>
                    <ul class="flex flex-col gap-1">
                        <li>
                            <a href="/reinhart" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">About<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                        <li>
                            <a href="https://shift.reinhart1010.id/note/statement-of-faith" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Statement of Faith<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                        <li>
                            <a href="https://shift.reinhart1010.id/note/church-affiliation" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Church Affiliation Notice<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                    </ul>
                </x-primitives.card>
                <x-primitives.card :theme-color="$theme_color" class="flex flex-col p-3 gap-3 rounded-xl">
                    <p class="text-xl font-medium">Professional</p>
                    <ul class="flex flex-col gap-1">
                        <li>
                            <a href="/portfolio" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Portfolio<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                        <li>
                            <a href="/for-recruiters" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">For Recruiters<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                        <li>
                            <a href="/contact" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Contact<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                    </ul>
                </x-primitives.card>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-3">
                    <picture>
                        <source srcset="/img/icons/shell-blue-female-neutral.avif" type="image/avif">
                        <source srcset="/img/icons/shell-blue-female-neutral.heic" type="image/heic">
                        <source srcset="/img/icons/shell-blue-female-neutral.webp" type="image/webp">
                        <source srcset="/img/icons/shell-blue-female-neutral.jp2" type="image/jp2">
                        <source srcset="/img/icons/shell-blue-female-neutral.png" type="image/png">
                        <img alt="Citra Manggala Dirgantara" src="/img/icons/shell-blue-female-neutral.png" height="668" width="873" style="height: 4rem; width: auto;">
                    </picture>
                    <div>
                        <h6 class="text-2xl font-semibold">Citra Manggala Dirgantara</h6>
                        <p class="text-sm">A Reinhart company</p>
                    </div>
                </div>
                <x-primitives.card :theme-color="$theme_color" class="flex flex-col p-3 gap-3 rounded-xl">
                    <p class="text-xl font-medium">Products</p>
                    <ul class="flex flex-col gap-1">
                        <li>
                            <a href="/apps" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Apps<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                    </ul>
                </x-primitives.card>
                <x-primitives.card :theme-color="$theme_color" class="flex flex-col p-3 gap-3 rounded-xl">
                    <p class="text-xl font-medium">Company</p>
                    <ul class="flex flex-col gap-1">
                        <li>
                            <a href="/contact" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Contact<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                    </ul>
                </x-primitives.card>
                <x-primitives.card :theme-color="$theme_color" class="flex flex-col p-3 gap-3 rounded-xl">
                    <p class="text-xl font-medium">Legal</p>
                    <ul class="flex flex-col gap-1">
                        <li>
                            <a href="https://legal.reinhart1010.id/privacy-policy" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">Privacy Policy<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                        <li>
                            <a rel="jslicense" href="/about/jslicense.html" class="flex items-center gap-1 text-black dark:text-white hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400">JavaScript License Information<x-fluentui-arrow-circle-right-24-o class="inline w-5 h-5"></x-fluentui-chevron-right-24></a>
                        </li>
                    </ul>
                </x-primitives.card>
            </div>
        </div>

        @livewireScripts
    </body>
    @if ($theme_scheme == "auto")
        <script>
            // For GNU LibreJS
            // @license magnet:?xt=urn:btih:d3d9a9a6595521f9666a5e94cc830dab83b65699&dn=expat.txt Expat License (sometimes called MIT Licensed)
            if (window.matchMedia) {
                const match = window.matchMedia('(prefers-color-scheme: dark)');
                if (match.matches) {
                    document.body.classList.add('dark');
                    Cookies.set('r10-current-auto-theme', 'dark', { expires: 0.25 });
                } else {
                    document.body.classList.remove('dark');
                    Cookies.set('r10-current-auto-theme', 'light', { expires: 0.25 });
                }

                // Add triggers when switching themes
                match.addEventListener('change', e => {
                    if (e.matches) {
                        document.body.classList.add('dark');
                        Cookies.set('r10-current-auto-theme', 'dark', { expires: 0.25 });
                    } else {
                        document.body.classList.remove('dark');
                        Cookies.set('r10-current-auto-theme', 'light', { expires: 0.25 });
                    }
                });
            }
            // @license-end
        </script>
    @endif
</html>
