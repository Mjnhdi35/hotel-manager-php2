<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <h2 class="text-2xl font-bold mb-4">Add Room for {{ $hotel->name }}</h2>

        <form action="{{ route('admin.hotel_rooms.store', $hotel->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Room Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Photo</label>
                <input type="file" name="photo" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Price (VNĐ/Đêm)</label>
                <input type="number" name="price" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Total People</label>
                <input type="number" name="total_people" class="w-full p-2 border rounded" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">
                Add Room
            </button>
        </form>
    </div>
</x-app-layout>