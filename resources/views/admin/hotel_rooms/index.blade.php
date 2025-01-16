<x-app-layout>
    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Manage Rooms - {{ $hotel->name }}</h2>
        <a href="{{ route('admin.hotel_rooms.create', $hotel) }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add New Room</a>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($rooms as $room)
            <div class="bg-white shadow-md rounded-lg mb-6 p-6 flex justify-between items-center">
                <div class="flex-shrink-0">
                    <img src="{{ Storage::url($room->photo) }}" alt="{{ $room->name }}"
                        class="w-32 h-32 object-cover rounded-md">
                </div>

                <div class="ml-6">
                    <h3 class="text-xl font-semibold">{{ $room->name }}</h3>
                    <p class="text-gray-500">{{ number_format($room->price, 0, ',', '.') }} VNĐ/Đêm</p>
                    <p class="text-gray-500">Max people: {{ $room->total_people }}</p>
                </div>

                <div class="ml-6 flex items-center">
                    <a href="{{ route('admin.hotel_rooms.show', $room) }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">View</a>
                    <a href="{{ route('admin.hotel_rooms.edit', $room) }}"
                        class="ml-4 text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                    <form action="{{ route('admin.hotel_rooms.destroy', $room) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>