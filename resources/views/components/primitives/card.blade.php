<?php
    $element = $attributes['element'] ?? 'div';
    $theme_color = $attributes['theme-color'] ?? 'blue';
    $disabled = $attributes['disabled'] ?? false;
    $filtered_attributes = iterator_to_array($attributes->getIterator());
    foreach (['class', 'element', 'theme-color'] as $forbidden_key) {
        unset($filtered_attributes[$forbidden_key]);
    }
    $other_attributes = join(' ',
    array_map(
        fn (string $k, string $v): string => "$k=\"$v\"", array_keys($filtered_attributes), array_values($filtered_attributes))
    );
?>
<{{ $element }} class="@if(!$disabled) bg-rc-{{ $theme_color }}-50 dark:bg-rc-{{ $theme_color }}-900 hover:bg-white dark:hover:bg-dm-{{ $theme_color }}-800 border-inset @else border-dotted @endif border-2 border-dm-{{ $theme_color }}-300 ease-out duration-200 will-change-auto hover:will-change-scroll @if($disabled) text-black/65 dark:text-white/65 @else text-black dark:text-white @endif accent-gr-{{ $theme_color }}-500 dark:accent-dm-{{ $theme_color }}-400 {{ $attributes['class'] }}" @if($disabled) aria-disabled="true" @endif {!! $other_attributes !!}>
    {{ $slot }}
</{{ $element }}>
