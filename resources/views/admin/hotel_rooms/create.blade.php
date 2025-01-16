<div class="max-w-lg mx-auto p-4 bg-white border border-gray-300 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Create New Hotel Room</h2>

    <form action="{{ route('admin.hotel_rooms.store', $hotel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Room Name</label>
            <input type="text" id="name" name="name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Room Photo</label>
            <input type="file" id="photo" name="photo"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="total_people" class="block text-sm font-medium text-gray-700">Total People</label>
            <input type="number" id="total_people" name="total_people"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md">Save Room</button>
    </form>
</div>