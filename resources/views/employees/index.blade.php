<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Manage Employees</h3>
                    {{-- Link to the Add Employee page --}}
                    <a href="{{ route('employees.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        + Add New Employee
                    </a>
                </div>

                {{-- THIS IS WHERE YOUR TABLE HTML GOES (from previous instructions) --}}
                {{-- You will loop through the $employees variable here. --}}

            </div>
        </div>
    </div>
</x-app-layout>