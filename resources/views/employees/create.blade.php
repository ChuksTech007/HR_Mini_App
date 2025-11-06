<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            ➕ {{ __('Add New Employee') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-8 lg:p-10">
                    <h3 class="text-xl font-semibold text-gray-700 mb-6 border-b pb-3">Employee Details</h3>
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                                <input type="text" id="name" name="name" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm p-3 transition duration-150 ease-in-out" required placeholder="John Doe">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                                <input type="email" id="email" name="email" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm p-3 transition duration-150 ease-in-out" required placeholder="john.doe@company.com">
                            </div>

                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                                <input type="text" id="position" name="position" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm p-3 transition duration-150 ease-in-out" placeholder="Software Engineer">
                            </div>

                            <div>
                                <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                                <input type="text" id="department" name="department" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm p-3 transition duration-150 ease-in-out" placeholder="Technology">
                            </div>

                            <div class="md:col-span-2">
                                <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">Annual Salary *</label>
                                <input type="number" step="0.01" id="salary" name="salary" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm p-3 transition duration-150 ease-in-out" required placeholder="e.g., 65000.00">
                            </div>
                        </div>

                        ---

                        <div class="flex items-center justify-end mt-8 pt-4 border-t">
                            <a href="{{ route('employees.index') }}" class="text-gray-600 hover:text-gray-900 font-medium px-4 py-2 transition duration-150 ease-in-out">
                                Cancel
                            </a>
                            <button type="submit" class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50">
                                <svg class="w-4 h-4 inline mr-2 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-3m-1-4l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                Save Employee
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>