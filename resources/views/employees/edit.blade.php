<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ isset($employee) ? __('Edit Employee') : __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
                        @csrf
                        @if (isset($employee))
                            @method('PATCH')
                        @endif

                        <!-- First Name -->
                        <div class="mb-4">
                            <label for="firstname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                            <input 
                                type="text" 
                                id="firstname" 
                                name="firstname" 
                                value="{{ old('firstname', $employee->firstname ?? '') }}" 
                                class="w-full p-2 border rounded @error('firstname') border-red-500 @enderror">
                            @error('firstname')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                            <input 
                                type="text" 
                                id="lastname" 
                                name="lastname" 
                                value="{{ old('lastname', $employee->lastname ?? '') }}" 
                                class="w-full p-2 border rounded @error('lastname') border-red-500 @enderror">
                            @error('lastname')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $employee->email ?? '') }}" 
                                class="w-full p-2 border rounded @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input 
                                type="text" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone', $employee->phone ?? '') }}" 
                                class="w-full p-2 border rounded @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Company -->
                        <div class="mb-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company</label>
                            <select 
                                id="company_id" 
                                name="company_id" 
                                class="w-full p-2 border rounded @error('company_id') border-red-500 @enderror">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button 
                                type="submit" 
                                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                                {{ isset($employee) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
