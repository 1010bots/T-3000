{{-- [name, source, license name, license url] --}}
<table id="{{ $id ?? '' }}" class="{{ $class ?? '' }}">
    <tr>
        <th>File Name</th>
        <th>License</th>
        <th>Source</th>
    </tr>
    @foreach ($data as $js)
        <tr>
            <td><a href="{{ $js[0] }}">{{ $js[0] }}</a></td>
            <td><a href="{{ $js[3] }}">{{ $js[2] }}</a></td>
            <td><a href="{{ $js[1] }}">{{ $js[1] }}</a></td>
        </tr>
    @endforeach
</table>