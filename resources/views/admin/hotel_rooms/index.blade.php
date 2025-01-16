<x-app-layout>
    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Manage Hotel Rooms</h2>
    </div>

    <div class="mx-auto max-w-7xl py-6">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Room Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Hotel</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Price (VNĐ)</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Total People</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($rooms as $index => $room)
                    <tr>
                        <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $room->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ $room->hotel->name }}</td>
                        <td class="px-6 py-4 text-sm">{{ number_format($room->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm">{{ $room->total_people }}</td>
                        <td class="px-6 py-4 text-sm flex space-x-4">
                            <a href="{{ route('hotel_rooms.edit', [$room->hotel->slug, $room]) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('hotel_rooms.destroy', [$room->hotel->slug, $room]) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No rooms available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $rooms->links() }}
        </div>
    </div>
</x-app-layout>