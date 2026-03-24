@props([
    'label' => null,
    'name',
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select an option',
    'required' => false,
    'id' => null,
])

@php
    $selectId = $id ?? $name;
@endphp

<div class="mb-6">
    @if ($label)
        <label for="{{ $selectId }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            {{ $label }}
        </label>
    @endif
    <select
        id="{{ $selectId }}"
        name="{{ $name }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => 'block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300']) }}
    >
        @if ($placeholder)
            <option value="" disabled @if(!$selected) selected @endif>{{ $placeholder }}</option>
        @endif
        @forelse ($options as $value => $label)
            <option value="{{ $value }}" @if($selected == $value) selected @endif>
                {{ $label }}
            </option>
        @empty
            {{ $slot }}
        @endforelse
    </select>
</div>

