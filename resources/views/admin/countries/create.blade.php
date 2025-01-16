<x-app-layout>
    <div class="bg-slate-200 shadow-sm max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Add New Country</h2>
    </div>

    <div class="max-w-4xl mx-auto mt-6 bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.countries.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-semibold text-gray-700">Country Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-2 text-gray-700 focus:ring focus:ring-orange-500"
                    placeholder="Enter country name" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.countries.index') }}" class="bg-gray-500 text-white rounded-lg px-4 py-2 mr-4">
                    Cancel
                </a>
                <button type="submit" class="bg-orange-900 text-white rounded-lg px-6 py-2">
                    Add Country
                </button>
            </div>
        </form>
    </div>
</x-app-layout>