@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gr-fuchsia-500 dark:focus:border-gr-fuchsia-600 focus:ring-gr-fuchsia-500 dark:focus:ring-gr-fuchsia-600 rounded-md shadow-sm']) !!}>
