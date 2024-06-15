<li>{{ $item['name'] }}</li>
@if (isset($item['children']))
    <ul>
        @foreach ($item['children'] as $child)
            @include('panel.categories.partials', ['item' => $child])
        @endforeach
    </ul>
@endif