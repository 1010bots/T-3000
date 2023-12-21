<?php
    $element = $attributes['element'] ?? 'a';
    $theme_color = $attributes['theme-color'] ?? 'blue';
    $filtered_attributes= iterator_to_array($attributes->getIterator());
    foreach (['class', 'element', 'theme-color'] as $forbidden_key) {
        unset($filtered_attributes[$forbidden_key]);
    }
    $other_attributes = join(' ',
        array_map(
            fn (string $k, string $v): string => "$k=$v", array_keys($filtered_attributes),array_values($filtered_attributes),
        )
    );
?>
<{{ $element }} class="text-gr-{{ $theme_color }}-500 dark:text-gr-{{ $theme_color }}-200 hover:text-gr-{{ $theme_color }}-700 dark:hover:text-gr-{{ $theme_color }}-400 font-bold ease-out duration-200 will-change-auto hover:will-change-scroll {{ $attributes['class'] }}" {{ $other_attributes }}>
    {{ $slot }}
</{{ $element }}>
