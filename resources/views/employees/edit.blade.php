<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Employee</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6">
        <form method="POST" action="{{ route('employees.update', $employee->id) }}"
            class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            @method('PUT')

            <x-input-label for="employee_id" :value="'Employee ID'" />
            <x-text-input id="employee_id" type="text" name="employee_id" class="w-full"
                value="{{ $employee->employee_id }}" readonly />

            <x-input-label for="name" :value="'Name'" />
            <x-text-input id="name" type="text" name="name" class="w-full" value="{{ $employee->name }}"
                required />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />

            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" type="email" name="email" class="w-full" value="{{ $employee->email }}"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />

            <x-input-label for="dob" :value="'Date of Birth'" />
            <x-text-input id="dob" type="date" name="dob" class="w-full" value="{{ $employee->dob }}"
                :max="now()->subYears(18)->toDateString()" required />
            <x-input-error :messages="$errors->get('dob')" class="mt-1" />

            <x-input-label for="doj" :value="'Date of Joining'" />
            <x-text-input id="doj" type="date" name="doj" class="w-full" :max="now()->toDateString()"
                value="{{ $employee->doj }}" required />
            <x-input-error :messages="$errors->get('doj')" class="mt-1" />

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('employees.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
