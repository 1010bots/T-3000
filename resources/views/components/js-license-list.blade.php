{{-- [name, source, license name, license url] --}}
<ul id="{{ $id ?? '' }}" class="{{ $class ?? '' }}">
    @foreach ($data as $js)
        <li>
            <p class="font-bold break-words">{{ $js[0] }} <a href="{{ $js[1] }}" class="text-gr-blue-600 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">(Source)</a></p>
            <p><a href="{{ $js[3] }}" class="text-gr-blue-600 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">{{ $js[2] }}</a></p>
        </li>
    @endforeach
</table>