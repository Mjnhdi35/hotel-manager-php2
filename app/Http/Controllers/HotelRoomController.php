<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Models\Hotel;
use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = HotelRoom::with('hotel')->orderByDesc('id')->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hotel $hotel)
    {
        return view('admin.rooms.create', compact('hotel'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request, Hotel $hotel)
    {
        $data = $request->validated();
        $data['photo'] = $request->file('photo')->store('rooms', 'public');
        $data['hotel_id'] = $hotel->id;

        HotelRoom::create($data);

        return redirect()->route('hotel_rooms.create', $hotel->slug)
            ->with('success', 'Room added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel, HotelRoom $hotelRoom)
    {
        return view('admin.rooms.show', compact('hotel', 'hotelRoom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel, HotelRoom $hotelRoom)
    {
        return view('admin.rooms.edit', compact('hotel', 'hotelRoom'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoomRequest $request, HotelRoom $hotelRoom)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        $hotelRoom->update($data);

        return redirect()->route('hotel_rooms.edit', [$hotelRoom->hotel->slug, $hotelRoom])
            ->with('success', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel, HotelRoom $hotelRoom)
    {
        $hotelRoom->delete();

        return redirect()->route('hotel_rooms.create', $hotel->slug)
            ->with('success', 'Room deleted successfully!');
    }

}
