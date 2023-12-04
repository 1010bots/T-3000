@props(['active'])

@php
$theme_color = $attributes['theme-color'] ?? "blue";
$classes = ($active ?? false)
            ? "inline-flex items-center px-1 pt-1 border-b-4 border-gr-$theme_color-400 dark:border-dm-$theme_color-300 text-md font-semibold leading-5 text-gray-900 dark:text-gray-100 transition duration-150 ease-in-out"
            : "inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-md leading-5 text-gray-500 dark:text-gray-400 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-rc-$theme_color-500 dark:focus:border-rc-$theme_color-500 transition duration-150 ease-in-out";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
