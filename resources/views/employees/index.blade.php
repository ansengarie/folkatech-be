<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Employees List</h3>
                        <a href="{{ route('employees.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                            Add Employees
                        </a>
                    </div>
                    <table class="w-full text-center border border-collapse border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="p-2 border">First Name</th>
                                <th class="p-2 border">Last Name</th>
                                <th class="p-2 border">Email</th>
                                <th class="p-2 border">Company</th>
                                <th class="p-2 border">Phone</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td class="p-2 border">{{ $employee->firstname }}</td>
                                    <td class="p-2 border">{{ $employee->lastname }}</td>
                                    <td class="p-2 border">
                                        <a href="{{ $employee->email }}">{{ $employee->email }}</a>  
                                    </td>
                                    <td class="p-2 border">{{ $employee->company->name ?? 'No Company' }}</td>
                                    <td class="p-2 border">{{ $employee->phone }}</td>
                                    <td class="p-2 border">
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-500 dark:text-blue-500">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center border">No employees found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
