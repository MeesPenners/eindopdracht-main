<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <x-content-panel>
        <!-- Vehicles Table -->
        <x-data-table
            id="vehicle-table"
            title="Vehicles"
            class="text-center"
            :headers="['Customer ID', 'Customer Name', 'Vehicle Name', 'Total Cost', 'Total Time', 'Status', 'Show']">
            @foreach ($vehicles as $vehicle)
                <tr>
                    <form method="GET" action="{{ route('vehicle.show', $vehicle->id) }}">
                        @csrf
                        <td class="border border-gray-600 px-4 py-2">
                            <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $vehicle->customer_id }}
                            </span>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $vehicle->customer->name }}
                            </span>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $vehicle->name }}
                            </span>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $vehicle->total_cost }}
                            </span>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $vehicle->total_time }}
                            </span>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            <span class="px-4 block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $vehicle->status->status }}
                            </span>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">
                            <x-table-action-button variant="show" />
                        </td>
                    </form>
                </tr>
            @endforeach
        </x-data-table>
    </x-content-panel>
</x-app-layout>
