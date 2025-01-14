<x-app-layout>

    <div class="bg-slate-200 shadow-sm flex justify-between items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl">Manage hotel</h2>
       
    </div>
    
    
   
    @foreach ($hotels as $hotel )
        <img src="{{ Storage::url($hotel->thumbnail) }}" alt="">
        <h3>{{ $hotel->name }}</h3>
        <p>{{ $hotel->city->name }} ,{{ $hotel->country->name }}</p>
<h3>
   VNĐ {{ number_format($hotel->getLowestRoomPrice(),0,',','.') }}/Đêm
</h3>

<a href="{{ route('admin.hotels.show',$hotel) }}">Manage </a>

        @endforeach
    </x-app-layout>