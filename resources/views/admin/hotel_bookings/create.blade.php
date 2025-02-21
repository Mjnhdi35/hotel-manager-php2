<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6">Create Hotel Booking for {{ $hotel->name }}</h2>

        <form action="{{ route('admin.hotel_bookings.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Room Selection -->
                <div>
                    <label for="hotel_room_id" class="block text-sm font-medium text-gray-700">Select Room</label>
                    <select id="hotel_room_id" name="hotel_room_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($hotel->rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }} - {{ number_format($room->price) }} VNĐ
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Number of Guests -->
                <div>
                    <label for="number_of_guests" class="block text-sm font-medium text-gray-700">Number of
                        Guests</label>
                    <input type="number" name="number_of_guests" id="number_of_guests"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <!-- Check-in Date -->
                <div>
                    <label for="check_in_date" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                    <input type="date" name="check_in_date" id="check_in_date"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <!-- Check-out Date -->
                <div>
                    <label for="check_out_date" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                    <input type="date" name="check_out_date" id="check_out_date"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Create
                    Booking</button>
            </div>
        </form>
    </div>
</x-app-layout>