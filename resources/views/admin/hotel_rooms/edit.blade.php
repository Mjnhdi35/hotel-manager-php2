<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg mt-8 p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Room for {{ $hotel->name }}</h2>

        <form action="{{ route('admin.hotel_rooms.update', ['hotel' => $hotel, 'hotel_room' => $hotelRoom]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <!-- Room Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $hotelRoom->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price (VNĐ/Night)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $hotelRoom->price) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <!-- Total People -->
            <div class="mb-4">
                <label for="total_people" class="block text-sm font-medium text-gray-700">Max People</label>
                <input type="number" name="total_people" id="total_people"
                    value="{{ old('total_people', $hotelRoom->total_people) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update
                    Room</button>
            </div>
        </form>
    </div>
</x-app-layout>