<x-app-layout>
    <div class="bg-slate-200 shadow-sm max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h2 class="text-3xl font-semibold">{{ $hotel->name }}</h2>
        <a href="{{ route('admin.hotel_rooms.create', $hotel) }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Room</a>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <h3 class="text-2xl font-semibold mb-4">Rooms</h3>

        @if ($hotel->rooms->isEmpty())
            <p class="text-gray-500">No rooms available.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($hotel->rooms as $room)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h4 class="text-lg font-semibold">{{ $room->name }}</h4>
                        <p class="text-gray-500">{{ number_format($room->price, 0, ',', '.') }} VNĐ/Night</p>
                        <p class="text-gray-500">Max People: {{ $room->total_people }}</p>

                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('admin.hotel_rooms.edit', ['hotel' => $hotel, 'hotel_room' => $room]) }}"
                                class="text-blue-500 hover:text-blue-700">Edit</a>

                            <form action="{{ route('admin.hotel_rooms.destroy', ['hotel' => $hotel, 'hotel_room' => $room]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>