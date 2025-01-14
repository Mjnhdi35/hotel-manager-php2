<x-app-layout>

    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Manage Country</h2>
        <a href="{{ route('admin.countries.create') }}" class="rounded-full bg-orange-950 text-white px-6 py-4 text-xl">Add new</a>
    </div>
    
    
    <div class=" max-w-7xl px-4 mx-auto lg:px-8 sm:px-4">
        <div class="flex justify-between items-center font-semibold text-xl py-4 ">
            <p>Name</p>
            <p>Date</p>
            <p></p>
        </div>
        @foreach ($countries as $country )
            <div class="flex justify-between items-center font-bold text-2xl py-4">
                <h3>{{ $country->name }}</h3>
                <h3>{{ $country->created_at->format('d M Y') }}</h3>
                <div class="flex justify-between items-center gap-3 ">
                    <a href="{{ route('admin.countries.edit',$country) }}" class="bg-orange-900 rounded-full px-4 py-2 text-white">Edit</a>
                    <form action="{{ route('admin.countries.destroy',$country) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-full px-4 py-2 bg-red-600 text-white">Delete</button>
                    </form>
                   
                </div>
            </div>
        @endforeach
     <div class="text-center py-4">
        {{ $countries->links() }}
     </div>
    </div>
    </x-app-layout>