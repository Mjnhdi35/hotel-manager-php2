<x-app-layout>
    <div class="max-w-4xl mx-auto mt-6 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6">Hotel Details</h2>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700">Name:</label>
            <p class="text-lg">{{ $hotel->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-700">Address:</label>
            <p class="text-lg">{{ $hotel->address }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-700">City:</label>
            <p class="text-lg">{{ $hotel->city->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-700">Country:</label>
            <p class="text-lg">{{ $hotel->country->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-700">Starting Level:</label>
            <p class="text-lg">{{ $hotel->start_level }}</p>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-700">Thumbnail:</label>
            <img src="{{ Storage::url($hotel->thumbnail) }}" class="w-full h-64 object-cover mt-2">
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.hotels.edit', $hotel) }}"
                class="bg-orange-600 text-white px-6 py-2 rounded-lg">Edit</a>
        </div>
    </div>
</x-app-layout>