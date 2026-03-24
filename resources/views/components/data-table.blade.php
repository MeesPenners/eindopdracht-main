@props([
    'id' => null,
    'title',
    'headers' => [],
    'class' => '',
])

<table @if($id) id="{{ $id }}" @endif class="table-auto w-full border-collapse border border-gray-600 mb-8 {{ $class }}">
    <thead>
        <tr>
            <th colspan="{{ count($headers) }}" class="text-center bg-gray-200 dark:bg-gray-700 py-2">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">{{ $title }}</h3>
            </th>
        </tr>
        <tr>
            @foreach ($headers as $header)
                <th class="border border-gray-600 px-1 py-2">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>

