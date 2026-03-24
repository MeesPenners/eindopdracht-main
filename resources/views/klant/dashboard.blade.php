<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Klant Dashboard') }}
        </h2>
    </x-slot>

    <x-content-panel>
        {{ __("Klant logged in!") }}
    </x-content-panel>
</x-app-layout>
