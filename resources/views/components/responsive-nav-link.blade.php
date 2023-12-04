@props(['active', 'color'])

@php
$theme_color = $attributes['theme-color'] ?? "blue";
$color_class = "border-gr-$theme_color-400 dark:border-gr-$theme_color-400 text-gr-$theme_color-700 dark:text-gr-$theme_color-300 bg-gr-$theme_color-50 dark:bg-gr-$theme_color-900/50 focus:outline-none focus:text-gr-$theme_color-800 dark:focus:text-gr-$theme_color-200 focus:bg-gr-$theme_color-100 dark:focus:bg-gr-$theme_color-900 focus:border-gr-$theme_color-700 dark:focus:border-gr-$theme_color-300";
if (isset($color)) switch (strtolower($color)) {
    case 'system':
        $color_class = 'border-gr-cyan-400 dark:border-gr-cyan-600 text-gr-cyan-700 dark:text-gr-cyan-300 bg-gr-cyan-50 dark:bg-gr-cyan-900/50 focus:outline-none focus:text-gr-cyan-800 dark:focus:text-gr-cyan-200 focus:bg-gr-cyan-100 dark:focus:bg-gr-cyan-900 focus:border-gr-cyan-700 dark:focus:border-gr-cyan-300';
        break;
    case 'root':
        $color_class = 'border-gr-green-400 dark:border-gr-green-600 text-gr-green-700 dark:text-gr-green-300 bg-gr-green-50 dark:bg-gr-green-900/50 focus:outline-none focus:text-gr-green-800 dark:focus:text-gr-green-200 focus:bg-gr-green-100 dark:focus:bg-gr-green-900 focus:border-gr-green-700 dark:focus:border-gr-green-300';
        break;
}
$classes = ($active ?? false)
            ? ('block w-full pl-3 pr-4 py-2 border-l-4 text-left text-base font-medium transition duration-150 ease-in-out' . ' ' . $color_class)
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
