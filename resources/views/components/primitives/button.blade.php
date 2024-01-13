<?php
    $element = $attributes['element'] ?? 'div';
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
<{{ $element }} class="px-4 py-2 rounded-full font-semibold bg-gr-{{ $theme_color }}-500 hover:bg-dm-{{ $theme_color }}-600 dark:hover:bg-gr-{{ $theme_color }}-400 ease-out duration-200 will-change-auto hover:will-change-scroll text-white {{ $attributes['class'] }}" {{ $other_attributes }}>
    {{ $slot }}
</{{ $element }}>
