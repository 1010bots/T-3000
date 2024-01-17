<?php
    $element = $attributes['element'] ?? 'div';
    $theme_color = $attributes['theme-color'] ?? 'blue';
    $filtered_attributes = iterator_to_array($attributes->getIterator());
    foreach (['class', 'element', 'theme-color'] as $forbidden_key) {
        unset($filtered_attributes[$forbidden_key]);
    }
    $other_attributes = join(' ',
    array_map(
        fn (string $k, string $v): string => "$k=\"$v\"", array_keys($filtered_attributes), array_values($filtered_attributes))
    );
?>
<{{ $element }} class="bg-rc-{{ $theme_color }}-50 dark:bg-rc-{{ $theme_color }}-900 hover:bg-white dark:hover:bg-dm-{{ $theme_color }}-800 border-2 border-inset border-dm-{{ $theme_color }}-300 ease-out duration-200 will-change-auto hover:will-change-scroll text-black dark:text-white accent-gr-{{ $theme_color }}-500 dark:accent-dm-{{ $theme_color }}-400 {{ $attributes['class'] }}" {!! $other_attributes !!}>
    {{ $slot }}
</{{ $element }}>
