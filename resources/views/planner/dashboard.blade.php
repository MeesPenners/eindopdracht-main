<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planner Dashboard') }}
        </h2>
    </x-slot>

    <x-content-panel>
        {{ __("Planner logged in!") }}
    </x-content-panel>
</x-app-layout>
