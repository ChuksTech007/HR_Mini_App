<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $employee->name ?? '') }}" required
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror">
    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $employee->email ?? '') }}" required
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror">
    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
    <input type="text" name="position" id="position" value="{{ old('position', $employee->position ?? '') }}" required
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('position') border-red-500 @enderror">
    @error('position') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
    <input type="number" name="salary" id="salary" value="{{ old('salary', $employee->salary ?? '') }}" step="0.01" required
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('salary') border-red-500 @enderror">
    @error('salary') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-6">
    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
    <input type="text" name="department" id="department" value="{{ old('department', $employee->department ?? '') }}" required
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('department') border-red-500 @enderror">
    @error('department') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>