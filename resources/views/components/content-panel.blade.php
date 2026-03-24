@props([
    'outerClass' => 'py-12',
    'containerClass' => 'max-w-7xl mx-auto sm:px-6 lg:px-8',
    'cardClass' => 'bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg',
    'bodyClass' => 'p-6 text-gray-900 dark:text-gray-100',
])

<div class="{{ $outerClass }}">
    <div class="{{ $containerClass }}">
        <div class="{{ $cardClass }}">
            <div class="{{ $bodyClass }}">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

