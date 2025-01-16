<x-app-layout>
    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Manage Hotels</h2>
        <a href="{{ route('admin.hotels.create') }}"
            class="rounded-full bg-orange-600 text-white px-6 py-3 text-lg hover:bg-orange-700">
            Add New Hotel
        </a>
    </div>

    <div class="mx-auto max-w-7xl py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($hotels as $hotel)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ Storage::url('images/' . $hotel->thumbnail) }}" alt="{{ $hotel->name }}"
                        class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $hotel->name }}</h3>
                        <p class="text-gray-600">{{ $hotel->city->name }}, {{ $hotel->country->name }}</p>
                        <h4 class="text-lg font-bold text-orange-500 mt-2">
                            {{ number_format($hotel->getLowestRoomPrice(), 0, ',', '.') }} VNĐ/Đêm
                        </h4>
                        <a href="{{ route('admin.hotels.show', $hotel) }}"
                            class="mt-4 inline-block text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700">
                            Manage Hotel
                        </a>
                    </div>
                </div>
            @empty
                <h1 class="text-center text-gray-600 text-2xl col-span-full">No hotels available</h1>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $hotels->links() }}
        </div>
    </div>
</x-app-layout>