<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelRoom $hotelRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelRoom $hotelRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelRoom $hotelRoom)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'price' => 'required|numeric',
            'total_people' => 'required|integer',
        ]);

        $hotelRoom->update($request->all());

        if ($request->hasFile('photo')) {
            $hotelRoom->photo = $request->file('photo')->store('room_photos', 'public');
            $hotelRoom->save();
        }

        return redirect()->route('admin.hotel_rooms.index', $hotelRoom->hotel)->with('success', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelRoom $hotelRoom)
    {
        $hotelRoom->delete();
        return redirect()->route('admin.hotel_rooms.index', $hotelRoom->hotel)->with('success', 'Room deleted successfully!');
    }
}
