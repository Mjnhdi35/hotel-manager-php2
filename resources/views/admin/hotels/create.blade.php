<x-app-layout>
    <div class="max-w-4xl mx-auto mt-6 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6">Add New Hotel</h2>

        <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Name:</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded-lg mt-2" value="{{ old('name') }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">City:</label>
                <select name="city_id" class="w-full border-gray-300 rounded-lg mt-2">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Country:</label>
                <select name="country_id" class="w-full border-gray-300 rounded-lg mt-2">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Thumbnail:</label>
                <input type="file" name="thumbnail" class="w-full border-gray-300 rounded-lg mt-2">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Address:</label>
                <input type="text" name="address" class="w-full border-gray-300 rounded-lg mt-2"
                    value="{{ old('address') }}">
            </div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg">Create</button>
        </form>
    </div>
</x-app-layout>