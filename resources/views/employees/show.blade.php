<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Employee Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50"> <div class="max-w-3xl mx-auto sm:px-6 lg:px-8"> <div class="bg-white p-8 shadow-xl sm:rounded-xl border border-gray-100"> <div class="flex items-center space-x-6 mb-8 pb-4 border-b border-gray-200">
                    <div class="flex-shrink-0 w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl font-semibold">
                        {{ substr($employee->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-3xl font-extrabold text-gray-900 leading-none">{{ $employee->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $employee->position }}</p>
                    </div>
                </div>

                <div class="space-y-4 text-gray-700">
                    <p class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <strong class="font-medium text-gray-600">Email:</strong> 
                        <span class="font-semibold text-blue-600">{{ $employee->email }}</span> 
                    </p>
                    <p class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <strong class="font-medium text-gray-600">Position:</strong> 
                        <span>{{ $employee->position }}</span>
                    </p>
                    <p class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <strong class="font-medium text-gray-600">Department:</strong> 
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $employee->department }}</span>
                    </p>
                    <p class="flex justify-between items-center pt-2">
                        <strong class="font-medium text-gray-600">Salary:</strong> 
                        <span class="text-xl font-bold text-green-700">₦{{ number_format($employee->salary, 2) }}</span>
                    </p>
                </div>

                <div class="mt-8 pt-4 border-t border-gray-200 flex space-x-4">
                    <a href="{{ route('employees.edit', $employee->id) }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 12v4a2 2 0 002 2h12a2 2 0 002-2v-4a1 1 0 00-2 0v4H4v-4a1 1 0 00-2 0z" clip-rule="evenodd" />
                        </svg>
                        Edit Profile
                    </a>
                    <a href="{{ route('employees.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        Back to List
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>