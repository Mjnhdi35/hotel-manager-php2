<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hotels = Hotel::orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:hotels,slug',
            'thumbnail' => 'required|image',
            'link_ggmaps' => 'nullable|url',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'address' => 'required|string|max:255',
            'start_level' => 'nullable|integer',
        ]);

        $hotel = Hotel::create($request->all());

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $hotel->thumbnail = $request->file('thumbnail')->store('thumbnails');
            $hotel->save();
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
        return view('admin.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
        return view('admin.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:hotels,slug,' . $hotel->id,
            'thumbnail' => 'nullable|image',
            'link_ggmaps' => 'nullable|url',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'address' => 'required|string|max:255',
            'start_level' => 'nullable|integer',
        ]);

        $hotel->update($request->all());

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $hotel->thumbnail = $request->file('thumbnail')->store('thumbnails');
            $hotel->save();
        }

        return redirect()->route('admin.hotels.show', $hotel)->with('success', 'Hotel updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully!');
    }
}
