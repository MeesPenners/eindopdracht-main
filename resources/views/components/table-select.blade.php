@props([
    'name',
    'selected' => null,
    'required' => false,
    'class' => '',
])

<select
    name="{{ $name }}"
    @if($required) required @endif
    {{ $attributes->merge(['class' => 'block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 ' . $class]) }}
>
    {{ $slot }}
</select>

