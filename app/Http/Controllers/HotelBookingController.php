<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelBookingRequest;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\HotelRoom;

use Illuminate\Support\Facades\Auth;

class HotelBookingController extends Controller
{
    public function index()
    {
        $bookings = HotelBooking::with('hotel', 'room')->get();
        return view('admin.hotel_bookings.index', compact('bookings'));
    }


    public function create($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId); // Tìm khách sạn theo ID
        return view('admin.hotel_bookings.create', compact('hotel'));
    }

    public function store(StoreHotelBookingRequest $request)
    {
        $validatedData = $request->validated();
        $room = HotelRoom::findOrFail($validatedData['hotel_room_id']);

        // Kiểm tra số khách có vượt quá giới hạn phòng không
        if ($validatedData['number_of_guests'] > $room->total_people) {
            return response()->json(['error' => 'The number of guests exceeds the room capacity.'], 422);
        }

        // Kiểm tra phòng trống
        $isRoomAvailable = $this->isRoomAvailable($room->id, $validatedData['check_in_date'], $validatedData['check_out_date']);
        if (!$isRoomAvailable) {
            return response()->json(['error' => 'The room is already booked for the selected dates.'], 422);
        }

        // Lưu đặt phòng
        $booking = new HotelBooking($validatedData);
        $booking->user_id = Auth::id();
        $booking->save();

        return redirect()->route('admin.hotel_bookings.index')->with('success', 'Booking created successfully!');
    }

    public function update(StoreHotelBookingRequest $request, HotelBooking $booking)
    {
        $validatedData = $request->validated();
        $room = HotelRoom::findOrFail($validatedData['hotel_room_id']);

        if ($validatedData['number_of_guests'] > $room->total_people) {
            return response()->json(['error' => 'The number of guests exceeds the room capacity.'], 422);
        }

        $isRoomAvailable = $this->isRoomAvailable($room->id, $validatedData['check_in_date'], $validatedData['check_out_date'], $booking->id);
        if (!$isRoomAvailable) {
            return response()->json(['error' => 'The room is already booked for the selected dates.'], 422);
        }

        $booking->update($validatedData);

        return response()->json($booking);
    }

    public function destroy(HotelBooking $booking)
    {
        $booking->delete();
        return response()->json(null, 204);
    }

    private function isRoomAvailable($roomId, $checkIn, $checkOut, $excludeBookingId = null)
    {
        $query = HotelBooking::where('hotel_room_id', $roomId)
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->whereBetween('check_in_date', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in_date', '<=', $checkIn)
                            ->where('check_out_date', '>=', $checkOut);
                    });
            });

        if ($excludeBookingId) {
            $query->where('id', '!=', $excludeBookingId);
        }

        return !$query->exists();
    }
    public function show($id)
    {
        $booking = HotelBooking::with('room', 'hotel')->findOrFail($id);
        return view('admin.hotel_bookings.show', compact('booking'));
    }


}