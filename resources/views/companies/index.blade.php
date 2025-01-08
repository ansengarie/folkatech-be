<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Companies List</h3>
                        <a href="{{ route('companies.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                            Add Company
                        </a>
                    </div>
                    <table class="w-full text-center border border-collapse border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="p-2 border">Logo</th>
                                <th class="p-2 border">Name</th>
                                <th class="p-2 border">Email</th>
                                <th class="p-2 border">Website</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td class="flex justify-center p-2 text-center border">
                                        @if ($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="object-cover w-16 h-16 ">
                                        @else
                                            <span class="text-gray-500">No Logo</span>
                                        @endif
                                    </td>
                                    <td class="p-2 border">{{ $company->name }}</td>
                                    <td class="p-2 border">{{ $company->email }}</td>
                                    <td class="p-2 border">
                                    <a href="{{ $company->website }}">{{ $company->website }}</a>  
                                    </td>
                                    <td class="p-2 border">
                                        <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center border">No companies found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
