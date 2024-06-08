<?php
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    $agent->setUserAgent(Request::header('User-Agent'));
    $is_apple = $agent->isiOS() || $agent->isiPadOS() || $agent->is('OS X');
    if (!$theme_color) {
        $theme_color = 'blue';
    }
?>
<div>
    <nav x-data="{ open: false }" class="bg-white dark:bg-black">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl pt-safe mx-auto px-safe-offset-4 sm:px-safe-offset-6 lg:px-safe-offset-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex items-center">
                        <x-nav-link :theme-color="$theme_color" href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link href="https://kenangan.com/kenanganku/reinhart1010?utm_source=reinhart1010&utm_campaign=reinhart1010-s2">
                            #import&lt;wishlist.h&gt;
                        </x-nav-link>
                        <x-nav-link :theme-color="$theme_color" href="{{ route('apps') }}" :active="request()->routeIs('apps')">
                            {{ __('Apps') }}
                        </x-nav-link>
                        <x-nav-link :theme-color="$theme_color" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                            {{ __('Contact') }}
                        </x-nav-link>
                        <x-primitives.card :theme-color="$theme_color" data-r-search-button="true" class="h-min px-4 py-2 rounded-full">
                            <x-fluentui-search-24 class="inline w-6 h-6 text-gr-{{ $theme_color }}-400 dark:text-gr-{{ $theme_color }}-200"/>
                            <span class="align-middle">{{ __('Search') }}</span>
                        </x-primitives.card>
                    </div>
                </div>

                @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ml-3 relative">
                                <x-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                                <x-fluentui-people-team-24 class="inline w-6 h-6 text-gr-blue-400 dark:text-gr-blue-400"/>
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-dropdown-link>
                                            @endcan

                                            <!-- Team Switcher -->
                                            @if (Auth::user()->allTeams()->count() > 1)
                                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Switch Teams') }}
                                                </div>

                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <x-switchable-team :team="$team" />
                                                @endforeach
                                            @endif
                                        </div>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}"
                                                @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                @endauth

                <!-- Hamburger -->
                <div class="flex items-center sm:hidden">
                    <x-primitives.card :theme-color="$theme_color" element="button" aria-label="Site Menu" @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </x-primitives.card>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :theme-color="$theme_color" href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :theme-color="$theme_color" href="https://kenangan.com/kenanganku/reinhart1010?utm_source=reinhart1010&utm_campaign=reinhart1010-s2">
                    #import&lt;wishlist.h&gt;
                </x-responsive-nav-link>
                <x-responsive-nav-link :theme-color="$theme_color" href="{{ route('apps') }}" :active="request()->routeIs('apps')">
                    {{ __('Apps') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :theme-color="$theme_color" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :theme-color="$theme_color" data-r-search-button="true">
                    {{ __('Search') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            @auth
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" color="root">
                            <x-fluentui-person-24 class="inline w-6 h-6 text-gr-green-400 dark:text-gr-green-400"/>
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-responsive-nav-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')" color="system">
                                <x-fluentui-people-team-24 class="inline w-6 h-6 text-gr-blue-400 dark:text-gr-blue-400"/>
                                {{ __('Team Settings') }}
                            </x-responsive-nav-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')" color="system">
                                    <x-fluentui-people-team-add-24 class="inline w-6 h-6 text-gr-blue-400 dark:text-gr-blue-400"/>
                                    {{ __('Create New Team') }}
                                </x-responsive-nav-link>
                            @endcan

                            <!-- Team Switcher -->
                            @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" component="responsive-nav-link" />
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            @endauth
        </div>
    </nav>
    <dialog id="search-dialog" class="p-0 rounded-xl bg-gray-100 dark:bg-gray-900 backdrop:bg-black/75 text-black dark:text-white border-0">
        <form method="dialog" class="flex space-x-3 w-full p-4">
            @if ($is_apple)
                <button>
                    <x-fluentui-dismiss-circle-24 aria-hidden="true" class="inline w-6 h-6 text-gr-red-400 active:text-red-600 focus:text-red-600 hover:text-red-600" />
                    <span class="sr-only">Close</span>
                </button>
            @endif
            <h1 class="grow text-2xl font-semibold">Search</h1>
            @if (!$is_apple)
                <button><x-fluentui-dismiss-24 aria-hidden="true" class="inline w-6 h-6 text-dark dark:text-white active:text-gray-600 dark:active:text-gray-400 hover:text-gray-600 dark:hover:text-gray-400" /><span class="sr-only">Close</span></button>
            @endif
        </form>
        <div class="p-4">
            <div class="flex items-end">
                <picture class="shrink-0">
                    <source srcset="/img/icons/bot-blue-female-neutral.avif" type="image/avif">
                    <source srcset="/img/icons/bot-blue-female-neutral.heic" type="image/heic">
                    <source srcset="/img/icons/bot-blue-female-neutral.webp" type="image/webp">
                    <source srcset="/img/icons/bot-blue-female-neutral.png" type="image/png">
                    <img alt="Reinhart Previano K." src="/img/icons/bot-blue-female-neutral.png" height="668" width="691" class="shrink-0" style="height: 6rem; width: 6rem;">
                </picture>
                <x-primitives.card class="h-min mb-4 p-2 rounded-lg">
                    {{-- <strong class="text-gr-blue-600 dark:text-gr-blue-100">Shiftine</strong> --}}
                    <p>Do you love to
                        @if($is_apple)
                            <kbd class="font-bold text-gr-blue-600 dark:text-gr-blue-100">⌘+K</kbd>, <kbd class="font-bold text-gr-blue-600 dark:text-gr-blue-100">⌘+/</kbd>, or just <kbd class="font-bold text-gr-blue-600 dark:text-gr-blue-100">/</kbd>
                        @else
                            <kbd class="font-bold text-gr-blue-600 dark:text-gr-blue-100">Ctrl-K</kbd>, <kbd class="font-bold text-gr-blue-600 dark:text-gr-blue-100">Ctrl-/</kbd>, or <kbd class="font-bold text-gr-blue-600 dark:text-gr-blue-100">/</kbd>
                        @endif
                    ? Now you can do three of them <span class="inline-block">(&gt;_ )</span>!</p>
                </x-primitives.card>
            </div>
            <x-primitives.card element="input" theme-color="violet" type="text" id="search-dialog-query" placeholder="Search..." class="w-full p-4 text-2xl rounded-xl" style="border-style: inset;" />
            <div id="search-dialog-results" class="my-4">
                <i>No results so far...</i>
            </div>
        </div>
    </dialog>
    <script>
        // For GNU LibreJS
        // @license magnet:?xt=urn:btih:d3d9a9a6595521f9666a5e94cc830dab83b65699&dn=expat.txt Expat License (sometimes called MIT Licensed)
        var searchSources = {
            "legal": {
                name: "Legal Information",
                color: "violet",
            },
            "nix": {
                name: "tldr-pages by Nix",
                color: "fuchsia"
            },
            "shift": {
                name: "Shift’s Digital Garden",
                color: "blue"
            },
            "wordpress": {
                name: "Blog Posts",
                color: "lime"
            },
        }
        function showSearchModal(query) {
            if (query) {
                // document.getElementById("search-dialog-query")?.value = query.toString();
            }
            document.getElementById("search-dialog")?.showModal();
            document.getElementById("search-dialog-query")?.focus();
        }
        document.querySelectorAll('[data-r-search-button="true"]').forEach((el) => {
            el.onclick = (e) => {
                e.preventDefault();
                showSearchModal();
            };
        });
        hotkeys('/, ctrl+k, ctrl+/, command+k, command+/', function (event, handler){
            event.preventDefault();
            if (handler.key == '/') {
                setTimeout(() => {
                    showSearchModal();
                }, 100);
            } else {
                showSearchModal();
            }
        });
        var timeout;
        function waitUntilSearch(_) {
            if (timeout != null) {
                window.clearTimeout(timeout);
            }
            timeout = window.setTimeout(() => {
                if (document.getElementById("search-dialog-query").value.length < 3) return;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var results = JSON.parse(xhttp.responseText);
                        var resultHTML = "";
                        var resultSources = Object.keys(results);
                        var i, j;

                        for (i = 0; i < resultSources.length; i++) {
                            for (j = 0; j < results[resultSources[i]].length; j++) {
                                var entry = results[resultSources[i]][j];
                                resultHTML += "<a href=\"" + entry.url + "\" class=\"block mb-2 p-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg text-lg\"><h3 class=\"mb-2 text-xl font-semibold\">" + entry.title + "</h3><div class=\"flex text-sm\"><span class=\"px-2 bg-gr-" + searchSources[resultSources[i]].color + "-500 dm:bg-dm-" + searchSources[resultSources[i]].color + "-500 text-white rounded\">" + searchSources[resultSources[i]].name + "</span></div></a>";
                            }
                        }
                        document.getElementById("search-dialog-results").innerHTML = resultHTML;
                    }
                };
                xhttp.open("GET", "/api/search?q=" + document.getElementById("search-dialog-query").value, true);
                xhttp.send();
            }, 1000);
        }
        document.getElementById("search-dialog-query")?.addEventListener("keyup", waitUntilSearch);
        document.getElementById("search-dialog-query")?.addEventListener("paste", waitUntilSearch);
        document.getElementById("search-dialog-query")?.addEventListener("submit", (e) => {
            e.preventDefault;
            waitUntilSearch();
        });
        // @license-end
    </script>
</div>
