@props([
    'variant' => 'save',
    'type' => 'submit',
])

@php
    $styles = [
        'delete' => 'bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded',
        'save' => 'bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded',
        'add' => 'bg-green-500 hover:bg-green-600 text-white px-1 py-2 rounded',
        'show' => 'bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded',
        'submit' => 'px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700',
    ];

    $labels = [
        'delete' => 'Delete',
        'save' => 'Save',
        'add' => 'Add',
        'show' => 'Show',
        'submit' => 'Submit',
    ];

    $variantStyles = $styles[$variant] ?? $styles['save'];
    $defaultLabel = $labels[$variant] ?? $labels['save'];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $variantStyles]) }}>
    {{ trim($slot) !== '' ? $slot : $defaultLabel }}
</button>

