<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monteur Dashboard') }}
        </h2>
    </x-slot>

    <x-content-panel>
        <h3 class="text-lg font-semibold mb-4">{{ __("Voertuig assemblage") }}</h3>
        @if (empty($selectedChassisId))
                    <!-- Form -->
                    <form method="POST" action="{{ route('monteur.chassis') }}">
                        @csrf

                        <x-form-input
                            label="Car name"
                            name="car_name"
                            type="text"
                            required
                        />

                        <x-form-select
                            label="Customer"
                            name="customer_id"
                            placeholder="Select a customer"
                            required
                        >
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </x-form-select>

                        <x-form-select
                            label="Chassis"
                            name="chassis_id"
                            placeholder="Select a chassis"
                            required
                        >
                            @foreach ($chassis as $chassisItem)
                                <option value="{{ $chassisItem->id }}">{{ $chassisItem->name }} &#8594;&#8364;{{ $chassisItem->costs }}</option>
                            @endforeach
                        </x-form-select>

                        <div class="mt-6">
                            <x-table-action-button variant="submit" />
                        </div>
                        @endif
                    </form>

                    @if (!empty($selectedChassisId))
                    <form method="POST" action="{{ route('monteur.store') }}">
                        @csrf

                        <x-form-input
                            label="Car name"
                            name="car_name"
                            type="text"
                            :value="$carName ?? 'Default car Name'"
                            readonly
                        />

                        <x-form-input
                            label="Customer"
                            name="customer_display"
                            type="text"
                            :value="$selectedCustomerId->name ?? 'Default Customer Name'"
                            readonly
                        />
                        <input type="hidden" name="customer_id" value="{{ $selectedCustomerId->id }}" />

                        <x-form-input
                            label="Chassis"
                            name="chassis_display"
                            type="text"
                            :value="html_entity_decode(($selectedChassisId->name ?? 'Default Chassis Name') . ' &#8594;&#8364;' . $selectedChassisId->costs)"
                            readonly
                        />
                        <input type="hidden" name="chassis_id" value="{{ $selectedChassisId->id }}" />

                        <x-form-select
                            label="Wheels"
                            name="wheel_id"
                            placeholder="Select a wheel"
                            required
                        >
                            @foreach ($wheels as $wheel)
                                <option value="{{ $wheel->id }}">{{ $wheel->name }} &#8594;&#8364;{{ $wheel->costs }}</option>
                            @endforeach
                        </x-form-select>

                        <x-form-select
                            label="Drive"
                            name="drive_id"
                            placeholder="Select a drive"
                            required
                        >
                            @foreach ($drives as $drive)
                                <option value="{{ $drive->id }}">{{ $drive->name }} &#8594;&#8364;{{ $drive->costs }}</option>
                            @endforeach
                        </x-form-select>

                        <x-form-select
                            label="Seat type"
                            name="seat_id"
                            placeholder="Select a seat"
                        >
                            @foreach ($seats as $seat)
                                <option value="{{ $seat->id }}">{{ $seat->name }} &#8594;&#8364;{{ $seat->costs }}</option>
                            @endforeach
                        </x-form-select>

                        <x-form-select
                            label="Number of Seats"
                            name="seat_amount"
                            placeholder="Select the number of seats"
                        >
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </x-form-select>

                        <x-form-select
                            label="Steering wheel"
                            name="steering_wheel_id"
                            placeholder="Select a steering wheel"
                            required
                        >
                            @foreach ($steeringWheels as $steeringWheel)
                                <option value="{{ $steeringWheel->id }}">{{ $steeringWheel->name }} &#8594;&#8364;{{ $steeringWheel->costs }}</option>
                            @endforeach
                        </x-form-select>

                        <div class="mt-6">
                            <x-table-action-button variant="submit" />
                        </div>
                    </form>
                    @endif
    </x-content-panel>
</x-app-layout>
