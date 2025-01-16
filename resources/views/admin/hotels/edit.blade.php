<x-app-layout>
    <div class="max-w-4xl mx-auto mt-6 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6">Edit Hotel</h2>

        <form action="{{ route('admin.hotels.update', $hotel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Name:</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded-lg mt-2"
                    value="{{ old('name', $hotel->name) }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">City:</label>
                <select name="city_id" class="w-full border-gray-300 rounded-lg mt-2">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @if($city->id == $hotel->city_id) selected @endif>{{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Country:</label>
                <select name="country_id" class="w-full border-gray-300 rounded-lg mt-2">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if($country->id == $hotel->country_id) selected @endif>
                            {{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Thumbnail:</label>
                <input type="file" name="thumbnail" class="w-full border-gray-300 rounded-lg mt-2">
                @if ($hotel->thumbnail)
                    <img src="{{ Storage::url($hotel->thumbnail) }}" class="w-32 h-32 mt-2 object-cover">
                @endif
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Address:</label>
                <input type="text" name="address" class="w-full border-gray-300 rounded-lg mt-2"
                    value="{{ old('address', $hotel->address) }}">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg">Update</button>
        </form>
    </div>
</x-app-layout>