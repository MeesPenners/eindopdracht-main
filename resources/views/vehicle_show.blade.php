<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicle Details') }}
        </h2>
    </x-slot>

    <x-content-panel
        outerClass="py-10"
        containerClass="max-w-4xl mx-auto px-6 lg:px-8"
        cardClass="bg-white dark:bg-gray-800 shadow rounded-2xl"
        bodyClass="p-6 space-y-6 text-gray-900 dark:text-gray-100">

                <!-- Vehicle Name & Info -->
                <div class="text-center">
                    <h3 class="text-7xl font-extrabold text-gray-800 dark:text-gray-100 mb-4">{{ $vehicle->name }}</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-2">Customer: <span class="font-semibold text-gray-800 dark:text-gray-100">{{ $vehicle->customer->name }}</span></p>
                    <p class="text-lg text-gray-600 dark:text-gray-400">Total Cost: <span class="font-semibold text-green-500">€{{ number_format($vehicle->total_cost, 2) }}</span></p>
                </div>

                <!-- Vehicle Modules -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- Chassis Module -->
                    @if($vehicle->chassis)
                        <x-module-card title="Chassis" :name="$vehicle->chassis->name" :image="$vehicle->chassis->image" />
                    @endif

                    <!-- Drive Module -->
                    @if($vehicle->drive)
                        <x-module-card title="Drive" :name="$vehicle->drive->name" :image="$vehicle->drive->image" />
                    @endif

                    <!-- Wheel Module -->
                    @if($vehicle->wheel)
                        <x-module-card title="Wheel" :name="$vehicle->wheel->name" :image="$vehicle->wheel->image" />
                    @endif

                    <!-- Steering Wheel Module -->
                    @if($vehicle->steering_wheel)
                        <x-module-card title="Steering Wheel" :name="$vehicle->steering_wheel->name" :image="$vehicle->steering_wheel->image" />
                    @endif

                    <!-- Seat Module -->
                    @if($vehicle->seat)
                        <x-module-card title="Seat" :name="$vehicle->seat->name . ' (x' . $vehicle->seat_amount . ')'" :image="$vehicle->seat->image" />
                    @endif

                </div>

    </x-content-panel>
</x-app-layout>
