<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ isset($company) ? __('Edit Company') : __('Add Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-900">
                    <form action="{{ isset($company) ? route('companies.update', $company) : route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($company))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block font-medium">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $company->name ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block font-medium">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $company->email ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="block font-medium">Logo</label>
                            <input type="file" id="logo" name="logo" class="w-full p-2 border rounded">
                            @if (isset($company) && $company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="h-16 mt-2">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="website" class="block font-medium">Website</label>
                            <input type="url" id="website" name="website" value="{{ old('website', $company->website ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                            {{ isset($company) ? 'Update' : 'Save' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
