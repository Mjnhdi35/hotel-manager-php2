<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6 mt-4">Manage Hotel Bookings</h2>

        <!-- Search Bar (optional) -->
        <div class="mb-6 flex items-center">
            <input type="text" id="search" class="form-input w-1/3 p-2 border rounded-md"
                placeholder="Search by guest name, email, or room" />
        </div>

        <!-- Booking Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guest
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Check-in Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Check-out Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $booking->guest_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->room->name }} -
                                {{ number_format($booking->room->price) }} VNĐ/Night
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->check_in_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->check_out_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.hotel_bookings.show', $booking->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">View</a>
                                <form action="{{ route('admin.hotel_bookings.destroy', $booking->id) }}" method="POST"
                                    class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>