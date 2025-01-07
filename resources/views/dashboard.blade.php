<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-lg font-semibold">Manage Data</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('companies.index') }}" class="block px-4 py-2 text-center text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                            Manage Companies
                        </a>
                        <a href="{{ route('employees.index') }}" class="block px-4 py-2 text-center text-white bg-green-500 rounded shadow hover:bg-green-600">
                            Manage Employees
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
