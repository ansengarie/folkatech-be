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
                            @method('PUT')
                        @endif

                        <!-- First Name -->
                        <div class="mb-4">
                            <label for="firstname" class="block font-medium">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $employee->firstname ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label for="lastname" class="block font-medium">Last Name</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $employee->lastname ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block font-medium">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $employee->email ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block font-medium">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $employee->phone ?? '') }}" class="w-full p-2 border rounded">
                        </div>

                        <!-- Company -->
                        <div class="mb-4">
                            <label for="company_id" class="block font-medium">Company</label>
                            <select id="company_id" name="company_id" class="w-full p-2 border rounded">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id ?? '') == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                            {{ isset($employee) ? 'Update' : 'Save' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
