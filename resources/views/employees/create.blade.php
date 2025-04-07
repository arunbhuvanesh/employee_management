<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Add Employee</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6">
        <form method="POST" action="{{ route('employees.store') }}" class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <x-input-label for="employee_id" :value="'Employee ID'" />
            <x-text-input id="employee_id" type="text" name="employee_id" class="w-full" required />
            <x-input-error :messages="$errors->get('employee_id')" class="mt-1" />

            <x-input-label for="name" :value="'Name'" />
            <x-text-input id="name" type="text" name="name" class="w-full" required />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />

            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" type="email" name="email" class="w-full" required />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />

            <x-input-label for="dob" :value="'Date of Birth'" />
            <x-text-input type="date" name="dob" :max="now()->subYears(18)->toDateString()" required />
            <x-input-error :messages="$errors->get('dob')" class="mt-1" />

            <x-input-label for="doj" :value="'Date of Joining'" />
            <x-text-input type="date" name="doj" :max="now()->toDateString()" required />
            <x-input-error :messages="$errors->get('doj')" class="mt-1" />

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('employees.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
