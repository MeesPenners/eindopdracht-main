@props([
    'name',
    'value' => null,
    'type' => 'text',
    'placeholder' => null,
    'required' => false,
    'class' => '',
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($required) required @endif
    {{ $attributes->merge(['class' => 'block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' . $class]) }}
>

