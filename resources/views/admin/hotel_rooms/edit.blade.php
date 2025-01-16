<x-app-layout>
    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Edit Room - {{ $hotelRoom->name }}</h2>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('admin.hotel_rooms.update', $hotelRoom) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $hotelRoom->name) }}"
                    class="mt-1 block w-full" required>
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-gray-700">Room Photo</label>
                <input type="file" name="photo" id="photo" class="mt-1 block w-full">
            </div>

            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700">Price (VNĐ)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $hotelRoom->price) }}"
                    class="mt-1 block w-full" required>
            </div>

            <div class="mb-6">
                <label for="total_people" class="block text-sm font-medium text-gray-700">Max People</label>
                <input type="number" name="total_people" id="total_people"
                    value="{{ old('total_people', $hotelRoom->total_people) }}" class="mt-1 block w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save</button>
        </form>
    </div>
</x-app-layout>