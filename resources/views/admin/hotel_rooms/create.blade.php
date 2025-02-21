<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.hotel_rooms.store', $hotel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Room Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price (VNĐ/Night)</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <!-- Total People -->
            <div class="mb-4">
                <label for="total_people" class="block text-sm font-medium text-gray-700">Max People</label>
                <input type="number" name="total_people" id="total_people" value="{{ old('total_people') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <!-- Photo -->
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Room Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add
                    Room</button>
            </div>
        </form>

    </div>
</x-app-layout>