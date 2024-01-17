<?php
    use \Illuminate\Support\Facades\DB;

    $theme_colors = ['blue', 'violet', 'seafoam'];
    $top_ua = DB::table('sessions')->select(DB::raw('`user_agent`, count(*) AS `count`'))->groupBy('user_agent')->orderBy('count', 'desc')->get();
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-black dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="d-flex flex-row">
        <!-- TODO: Add Sidebar -->
        <main class="flex flex-col gap-4 text-black dark:text-white">
            <div class="grid grid-cols-6 w-full p-safe-offset-4 gap-4">
                <x-primitives.card :theme-color="$theme_colors[1]" class="col-span-6 md:col-span-2 p-4 rounded-2xl">
                    <x-fluentui-library-24-o class="w-10 h-10" />
                    <h2 class="font-sans text-2xl font-semibold">Top User Agents</h2>
                    <ul class="mt-2">
                        @foreach ($top_ua as $i => $ua)
                            @if ($i > 0)
                                <li aria-hidden="true">
                                    <hr class="my-2 border-black/10 dark:border-white/10" aria-hidden="true" />
                                </li>
                            @endif
                            <li>
                                <p>{{ $ua->user_agent }}</p>
                            </li>
                        @endforeach
                    </ul>
                </x-primitives.card>
                <div class="col-span-6 md:col-span-2 p-4 rounded-2xl bg-dm-fuchsia-400 dark:bg-dm-fuchsia-700 text-white">
                    <x-fluentui-people-audience-24-o class="w-10 h-10" />
                    <h2 class="font-sans text-2xl font-semibold">There’s a plenty of data coming soon.</h2>
                </div>
                <x-primitives.card theme-color="red" class="flex items-center justify-center col-span-6 md:col-span-2 p-4 rounded-2xl text-3xl text-center">
                    <p>/* Todoist Karma */</p>
                </x-primitives.card>
                <x-primitives.card theme-color="green" class="flex items-center justify-center col-span-6 md:col-span-2 p-4 rounded-2xl text-3xl text-center">
                    <p>/* GitHub Contribs */</p>
                </x-primitives.card>
                <x-primitives.card theme-color="cyan" class="flex items-center justify-center col-span-6 md:col-span-2 p-4 rounded-2xl text-3xl text-center">
                    <p>/* GitLab Contribs */</p>
                </x-primitives.card>
                <x-primitives.card theme-color="lime" class="flex items-center justify-center col-span-6 md:col-span-2 p-4 rounded-2xl text-3xl text-center">
                    <p>/* OpenStreetMap Contribs */</p>
                </x-primitives.card>
            </div>
        </main>
    </div>
</x-app-layout>
