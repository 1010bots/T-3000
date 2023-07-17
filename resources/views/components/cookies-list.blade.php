{{-- [name, source, license name, license url] --}}
<ul id="{{ $id ?? '' }}" class="{{ $class ?? '' }}">
    @foreach ($data as $cookie)
        <li>
            <?php
                $dt = new DateTime();
                $dt->add(new DateInterval('PT' . ($cookie['duration'] + 3) . 'S'));
                $interval = $dt->diff(new DateTime());
                $duration_text = [];
                if ($cookie['duration'] >= 3600) array_push($duration_text, '%a days');
                if ($cookie['duration'] % 3600 > 0) {
                    
                }
                // TODO:

            ?>
            <p class="font-bold break-words">{{ $cookie['name'] }}</p>
            <p>Stored for {{ $cookie['host'] }}</p>
            <p>Expires {{ $interval->format(($cookie['duration'] >= 3600 ? '%a days, ' : '') . '%Hh %Im') }} after being set</p>
            {{-- <p><a href="{{ $cookie[3] }}" class="text-gr-blue-600 dark:text-gr-blue-300 active:text-gr-blue-800 dark:active:text-gr-blue-500 hover:text-gr-blue-800 dark:hover:text-gr-blue-500">{{ $cookie[2] }}</a></p> --}}
        </li>
    @endforeach
</table>