<x-app-layout>
    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Manage Hotels</h2>
        <a href="{{ route('admin.hotels.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add New Hotel</a>
    </div>

    <!-- List of Hotels -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($hotels as $hotel)
            <div class="bg-white shadow-md rounded-lg mb-6 p-6 flex justify-between items-center">
                <!-- Hotel Thumbnail -->
                <div class="flex-shrink-0">
                    <img src="{{ Storage::url($hotel->thumbnail) }}" alt="{{ $hotel->name }}"
                        class="w-32 h-32 object-cover rounded-md">
                </div>

                <!-- Hotel Details -->
                <div class="ml-6">
                    <h3 class="text-xl font-semibold">{{ $hotel->name }}</h3>
                    <p class="text-gray-500">{{ $hotel->city->name }}, {{ $hotel->country->name }}</p>
                    <h3 class="text-lg font-medium mt-2">
                        {{ number_format($hotel->getLowestRoomPrice(), 0, ',', '.') }} VNĐ/Đêm
                    </h3>
                </div>

                <!-- Manage Hotel Link -->
                <div class="ml-6 flex items-center">
                    <a href="{{ route('admin.hotels.show', $hotel) }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">Manage</a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>