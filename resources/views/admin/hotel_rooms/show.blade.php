<x-app-layout>
    <h1>Room Details: {{ $hotelRoom->name }} for {{ $hotel->name }}</h1>

    <div>
        <p><strong>Name:</strong> {{ $hotelRoom->name }}</p>
        <p><strong>Price:</strong> {{ number_format($hotelRoom->price, 0, ',', '.') }} VNĐ</p>
        <p><strong>Total People:</strong> {{ $hotelRoom->total_people }}</p>


        <div>
            <img src="{{ Storage::url('rooms/' . $hotelRoom->photo) }}" alt="{{ $hotelRoom->name }}" class="w-1/2">
        </div>



        <a href="{{ route('hotel_rooms.edit', [$hotel->slug, $hotelRoom->id]) }}" class="btn btn-primary">Edit Room</a>
    </div>
</x-app-layout>