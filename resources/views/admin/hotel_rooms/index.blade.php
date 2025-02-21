<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg mt-8 p-6">
        <h2 class="text-2xl font-semibold mb-6">Add New Room for {{ $hotel->name }}</h2>

        <form action="{{ route('admin.hotel_rooms.store', $hotel) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Room Name</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price per Night (VNĐ)</label>
                <input type="number" id="price" name="price" class="w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ old('price') }}" required>
            </div>

            <div class="mb-4">
                <label for="total_people" class="block text-gray-700">Maximum People</label>
                <input type="number" id="total_people" name="total_people"
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('total_people') }}" min="1"
                    required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add
                    Room</button>
            </div>
        </form>
    </div>
</x-app-layout>