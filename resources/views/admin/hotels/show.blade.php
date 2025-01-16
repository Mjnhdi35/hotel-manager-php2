<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel: ') }} {{ $hotel->name }}
        </h2>
    </x-slot>

    <div class="my-6">
        <h3 class="text-lg font-semibold">Rooms</h3>
        <a href="{{ route('admin.hotel_rooms.create', $hotel) }}" class="bg-green-500 text-white py-2 px-4 rounded">Add
            Room</a>
    </div>

    @forelse ($hotel->rooms as $room)
        <div class="p-4 bg-white border mb-4">
            <h4 class="font-semibold">{{ $room->name }}</h4>
            <div class="flex items-center">
                @if ($room->photo)
                    <img src="{{ Storage::url($room->photo) }}" alt="Room Photo" class="w-32 h-32 object-cover mr-4">
                @endif
                <div>
                    <p class="text-sm">Price: VNĐ {{ number_format($room->price, 0, ',', '.') }} / Night</p>
                    <p class="text-sm">Capacity: {{ $room->total_people }} persons</p>
                </div>
            </div>
            <div class="mt-4 flex justify-between">
                <a href="{{ route('admin.hotel_rooms.edit', [$hotel, $room]) }}" class="text-blue-500">Edit</a>

                <form action="{{ route('admin.hotel_rooms.destroy', [$hotel, $room]) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No rooms available for this hotel.</p>
    @endforelse

</x-app-layout>