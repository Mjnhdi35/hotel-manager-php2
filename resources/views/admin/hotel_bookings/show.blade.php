<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6">Booking Details for {{ $booking->guest_name }}</h2>

        <div class="space-y-6">
            <!-- Guest Info -->
            <div>
                <h3 class="text-xl font-medium text-gray-800">Guest Information</h3>
                <p><strong>Name:</strong> {{ $booking->guest_name }}</p>
                <p><strong>Email:</strong> {{ $booking->guest_email }}</p>
            </div>

            <!-- Room Info -->
            <div>
                <h3 class="text-xl font-medium text-gray-800">Room Information</h3>
                <p><strong>Room:</strong> {{ $booking->room->name }}</p>
                <p><strong>Price per Night:</strong> {{ number_format($booking->room->price) }} VNĐ</p>
            </div>

            <!-- Booking Info -->
            <div>
                <h3 class="text-xl font-medium text-gray-800">Booking Information</h3>
                <p><strong>Check-in Date:</strong> {{ $booking->check_in_date }}</p>
                <p><strong>Check-out Date:</strong> {{ $booking->check_out_date }}</p>
                <p><strong>Number of Guests:</strong> {{ $booking->number_of_guests }}</p>
                <p><strong>Status:</strong>
                    <span
                        class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
            </div>

            <!-- Actions -->
            <div class="mt-6">
                <a href="{{ route('admin.hotel_bookings.edit', $booking->id) }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Edit Booking</a>

                <form action="{{ route('admin.hotel_bookings.destroy', $booking->id) }}" method="POST"
                    class="inline ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete
                        Booking</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>