<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inkoper Dashboard') }}
        </h2>
    </x-slot>

    <x-content-panel containerClass="max-w-9xl mx-auto sm:px-6 lg:px-8">

                    <!-- Chassis Table -->
                    <x-data-table
                        id="chassis-table"
                        title="Chassis"
                        :headers="['Del/Res', 'Name', 'Wheel Amount', 'Vehicle Type', 'Length', 'Width', 'Height', 'Time', 'Costs', 'Image Path', 'Save']">
                            @foreach ($chassis as $chassisItem)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('chassis.deleteorrestore', $chassisItem->id) }}">
                                        @csrf
                                        <x-table-action-button variant="delete">
                                            {{ $chassisItem->trashed() ? 'Restore' : 'Delete' }}
                                        </x-table-action-button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('chassis.update', $chassisItem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" value="{{ $chassisItem->name }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="wheel_amount_id" required>
                                            @foreach ($wheelAmounts as $wheelAmount)
                                            <option value="{{ $wheelAmount->id }}" {{ $chassisItem->wheel_amount_id == $wheelAmount->id ? 'selected' : '' }}>
                                                {{ $wheelAmount->amount }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="vehicle_type_id" required>
                                            @foreach ($vehicleTypes as $vehicleType)
                                            <option value="{{ $vehicleType->id }}" {{ $chassisItem->vehicle_type_id == $vehicleType->id ? 'selected' : '' }}>
                                                {{ $vehicleType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="length" value="{{ $chassisItem->length }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="width" value="{{ $chassisItem->width }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="height" value="{{ $chassisItem->height }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" value="{{ $chassisItem->time }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" value="{{ $chassisItem->costs }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image" value="{{ $chassisItem->image }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="save" />
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('chassis.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" placeholder="e.g., Nikinella" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="wheel_amount_id" required>
                                            @foreach ($wheelAmounts as $wheelAmount)
                                            <option value="{{ $wheelAmount->id }}">
                                                {{ $wheelAmount->amount }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="vehicle_type_id" required>
                                            @foreach ($vehicleTypes as $vehicleType)
                                            <option value="{{ $vehicleType->id }}">
                                                {{ $vehicleType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="length" placeholder="e.g., 500" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="width" placeholder="e.g., 200" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="height" placeholder="e.g., 200" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" placeholder="e.g., 2" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" placeholder="e.g., 65000" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" placeholder="image_not_set.png" />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="add" />
                                    </td>
                                </form>
                            </tr>
                    </x-data-table>











                    <!-- Drives Table -->
                    <x-data-table
                        id="drives-table"
                        title="Drives"
                        :headers="['Del/Res', 'Name', 'Drive type', 'Power', 'Time', 'Costs', 'Image path', 'Save']">
                            @foreach ($drives as $drive)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('drives.deleteorrestore', $drive->id) }}">
                                        @csrf
                                        <x-table-action-button variant="delete">
                                            {{ $drive->trashed() ? 'Restore' : 'Delete' }}
                                        </x-table-action-button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('drives.update', $drive->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" value="{{ $drive->name }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="drive_type_id" required>
                                            @foreach ($driveTypes as $driveType)
                                            <option value="{{ $driveType->id }}" {{ $drive->drive_type_id == $driveType->id ? 'selected' : '' }}>
                                                {{ $driveType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="power" value="{{ $drive->power }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" value="{{ $drive->time }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" value="{{ $drive->costs }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" value="{{ $drive->image }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="save" />
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('drives.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" placeholder="e.g., Elektrisch500" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="drive_type_id" required>
                                            <option value="" disabled selected>Select Drive Type</option>
                                            @foreach ($driveTypes as $driveType)
                                            <option value="{{ $driveType->id }}">
                                                {{ $driveType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="power" placeholder="e.g., 500" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" placeholder="e.g., 4" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" placeholder="e.g., 65000" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" placeholder="image_not_set.png" />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="add" />
                                    </td>
                                </form>
                            </tr>
                    </x-data-table>








                    <!-- Seats Table -->
                    <x-data-table
                        id="seats-table"
                        title="Seats"
                        :headers="['Del/Res', 'Name', 'Material type', 'Time', 'Costs', 'Image path', 'Save']">
                            @foreach ($seats as $seat)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('seats.deleteorrestore', $seat->id) }}">
                                        @csrf
                                        <x-table-action-button variant="delete">
                                            {{ $seat->trashed() ? 'Restore' : 'Delete' }}
                                        </x-table-action-button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('seats.update', $seat->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" value="{{ $seat->name }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="seat_material_id" required>
                                            @foreach ($materialTypes as $materialType)
                                            <option value="{{ $materialType->id }}" {{ $seat->seat_material_id == $materialType->id ? 'selected' : '' }}>
                                                {{ $materialType->material }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" value="{{ $seat->time }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" value="{{ $seat->costs }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" value="{{ $seat->image }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="save" />
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('seats.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" placeholder="e.g., ComfortSeat" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="seat_material_id" required>
                                            <option value="" disabled selected>Select Material Type</option>
                                            @foreach ($materialTypes as $materialType)
                                            <option value="{{ $materialType->id }}">
                                                {{ $materialType->material }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" placeholder="e.g., 4" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" placeholder="e.g., 3500" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" placeholder="image_not_set.png" />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="add" />
                                    </td>
                                </form>
                            </tr>
                    </x-data-table>








                    <!-- Steering wheel Table -->
                    <x-data-table
                        id="steering-wheel-table"
                        title="Steering Wheels"
                        :headers="['Del/Res', 'Name', 'Specialization', 'Steering Type', 'Time', 'Costs', 'Image path', 'Save']">
                            @foreach ($steeringWheels as $steeringWheel)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('steeringWheels.deleteorrestore', $steeringWheel->id) }}">
                                        @csrf
                                        <x-table-action-button variant="delete">
                                            {{ $steeringWheel->trashed() ? 'Restore' : 'Delete' }}
                                        </x-table-action-button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('steeringWheels.update', $steeringWheel->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" value="{{ $steeringWheel->name }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <input type="text" name="specialization" value="{{ $steeringWheel->specialization }}" class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="steering_type_id" required>
                                            @foreach ($steeringTypes as $steeringType)
                                            <option value="{{ $steeringType->id }}" {{ $steeringWheel->steering_type_id == $steeringType->id ? 'selected' : '' }}>
                                                {{ $steeringType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" value="{{ $steeringWheel->time }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" value="{{ $steeringWheel->costs }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" value="{{ $steeringWheel->image }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="save" />
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('steeringWheels.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" placeholder="e.g., SchapenStadium" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="specialization" placeholder="e.g., Schapenvacht" />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="steering_type_id" required>
                                            <option value="" disabled selected>Select Steeringwheel Type</option>
                                            @foreach ($steeringTypes as $steeringType)
                                            <option value="{{ $steeringType->id }}">
                                                {{ $steeringType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" placeholder="e.g., 4" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" placeholder="e.g., 3500" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" placeholder="image_not_set.png" />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="add" />
                                    </td>
                                </form>
                            </tr>
                    </x-data-table>








                    <!-- Wheels Table -->
                    <x-data-table
                        id="wheels-table"
                        title="Wheels"
                        :headers="['Del/Res', 'Name', 'Wheel type', 'Power', 'Time', 'Costs', 'Image path', 'Save']">
                            @foreach ($wheels as $wheel)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('wheels.deleteorrestore', $wheel->id) }}">
                                        @csrf
                                        <x-table-action-button variant="delete">
                                            {{ $wheel->trashed() ? 'Restore' : 'Delete' }}
                                        </x-table-action-button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('wheels.update', $wheel->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" value="{{ $wheel->name }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="wheel_type_id" required>
                                            @foreach ($wheelTypes as $wheelType)
                                            <option value="{{ $wheelType->id }}" {{ $wheel->wheel_type_id == $wheelType->id ? 'selected' : '' }}>
                                                {{ $wheelType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="diameter" value="{{ $wheel->diameter }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" value="{{ $wheel->time }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" value="{{ $wheel->costs }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" value="{{ $wheel->image }}" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="save" />
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('wheels.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="name" placeholder="e.g., Z15-4" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="wheel_type_id" required>
                                            <option value="" disabled selected>Select Wheel Type</option>
                                            @foreach ($wheelTypes as $wheelType)
                                            <option value="{{ $wheelType->id }}">
                                                {{ $wheelType->type }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="diameter" placeholder="e.g., 15" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="time" placeholder="e.g., 4" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="number" name="costs" placeholder="e.g., 65000" required />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-input type="text" name="image_path" placeholder="image_not_set.png" />
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="add" />
                                    </td>
                                </form>
                            </tr>
                    </x-data-table>








                    <!-- Suitable chassis Table -->
                    <x-data-table
                        id="suitable-chassis-table"
                        title="Suitable Chassis"
                        :headers="['Del/Res', 'Wheel', 'Chassis', 'Save']">
                            @foreach ($suitableChassis as $suitableChassisItem)
                            <tr>
                                <td class="border border-gray-600 px-1 py-2 text-center">
                                    <form method="POST" action="{{ route('suitableChassis.deleteorrestore', $suitableChassisItem->id) }}">
                                        @csrf
                                        <x-table-action-button variant="delete">
                                            {{ $suitableChassisItem->trashed() ? 'Restore' : 'Delete' }}
                                        </x-table-action-button>
                                    </form>
                                </td>
                                <form method="POST" action="{{ route('suitableChassis.update', $suitableChassisItem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="wheel_id" required>
                                            @foreach ($wheels as $wheel)
                                            <option value="{{ $wheel->id }}" {{ $suitableChassisItem->wheel_id == $wheel->id ? 'selected' : '' }}>
                                                {{ $wheel->name }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="chassis_id" required>
                                            @foreach ($chassis as $chassisItem)
                                            <option value="{{ $chassisItem->id }}" {{ $suitableChassisItem->chassis_id == $chassisItem->id ? 'selected' : '' }}>
                                                {{ $chassisItem->name }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="save" />
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                            <tr>
                                <form method="POST" action="{{ route('suitableChassis.new') }}">
                                    @csrf
                                    <td></td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="wheel_id" required>
                                            <option value="" disabled selected>Select Wheel</option>
                                            @foreach ($wheels as $wheel)
                                            <option value="{{ $wheel->id }}">
                                                {{ $wheel->name }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-select name="chassis_id" required>
                                            <option value="" disabled selected>Select Chassis</option>
                                            @foreach ($chassis as $chassisItem)
                                            <option value="{{ $chassisItem->id }}">
                                                {{ $chassisItem->name }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                    </td>
                                    <td class="border border-gray-600 px-1 py-2">
                                        <x-table-action-button variant="add" />
                                    </td>
                                </form>
                            </tr>
                    </x-data-table>
    </x-content-panel>
</x-app-layout>
