<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Employee List</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @role('admin')
            <div class="mb-4 text-right">
                <a href="{{ route('employees.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    + Add New
                </a>
            </div>
        @endrole

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Employee ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">DOB</th>
                        <th class="px-6 py-3">DOJ</th>
                        @role('admin')
                            <th class="px-6 py-3">Actions</th>
                        @endrole
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($employees as $emp)
                        <tr>
                            <td class="px-6 py-4">{{ $emp->employee_id }}</td>
                            <td class="px-6 py-4">{{ $emp->name }}</td>
                            <td class="px-6 py-4">{{ $emp->email }}</td>
                            <td class="px-6 py-4">{{ $emp->dob }}</td>
                            <td class="px-6 py-4">{{ $emp->doj }}</td>
                            @role('admin')
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('employees.edit', $emp) }}"
                                       class="text-indigo-600 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('employees.destroy', $emp) }}"
                                          class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
