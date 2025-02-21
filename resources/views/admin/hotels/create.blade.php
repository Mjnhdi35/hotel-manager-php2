<x-app-layout>
    <form method="POST" action="{{ route('admin.hotels.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg space-y-6">
            <h2 class="text-2xl font-semibold text-center text-gray-800">Create New Hotel</h2>

            <!-- Hotel Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Hotel Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Google Maps Link -->
            <div class="mb-4">
                <label for="link_ggmaps" class="block text-sm font-medium text-gray-700">Google Maps Link</label>
                <input type="url" name="link_ggmaps" id="link_ggmaps"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="https://maps.google.com/your-map-link">
            </div>

            <!-- City -->
            <div class="mb-4">
                <label for="city_id" class="block text-sm font-medium text-gray-700">City</label>
                <select name="city_id" id="city_id"
                    class="select2 mt-1 block w-full appearance-none bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                    <option value="">Select a city</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>
                <select name="country_id" id="country_id"
                    class="select2 mt-1 block w-full appearance-none bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                    <option value="">Select a country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Thumbnail -->
            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    class="mt-1 block w-full file:border-0 file:bg-blue-500 file:text-white file:py-2 file:px-4 file:rounded-md hover:file:bg-blue-600"
                    required>
            </div>

            <!-- Start Level -->
            <div class="mb-4">
                <label for="start_level" class="block text-sm font-medium text-gray-700">Start Level</label>
                <input type="number" name="start_level" id="start_level" min="1" max="5"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Create
                    Hotel</button>
            </div>
        </div>
    </form>

    <!-- Include Select2 JS and CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize select2 for city and country selects
            $('#city_id').select2({
                placeholder: "Select a city",
                allowClear: true
            });
            $('#country_id').select2({
                placeholder: "Select a country",
                allowClear: true
            });
        });
    </script>
</x-app-layout>