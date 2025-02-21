<?php


namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelRoomController extends Controller
{
    public function create(Hotel $hotel)
    {
        return view('admin.hotel_rooms.create', compact('hotel')); // Trả về view tạo phòng khách sạn
    }

    public function store(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_people' => 'required|integer|min:1',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png', // Kiểm tra ảnh phòng
        ]);

        // Xử lý file nếu có ảnh
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Lưu ảnh vào thư mục photos
        }

        // Tạo phòng mới cho khách sạn
        $hotel->rooms()->create([
            'name' => $request->name,
            'price' => $request->price,
            'total_people' => $request->total_people,
            'photo' => $photoPath, // Lưu đường dẫn ảnh
        ]);

        return redirect()->route('admin.hotels.show', $hotel)->with('success', 'Room added successfully.'); // Quay lại trang quản lý khách sạn
    }

    public function edit(Hotel $hotel, HotelRoom $hotelRoom)
    {
        return view('admin.hotel_rooms.edit', compact('hotel', 'hotelRoom')); // Trả về view chỉnh sửa phòng
    }

    public function update(Request $request, HotelRoom $hotelRoom)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_people' => 'required|integer|min:1',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png', // Kiểm tra ảnh phòng
        ]);

        // Xử lý file nếu có ảnh mới
        $photoPath = $hotelRoom->photo;
        if ($request->hasFile('photo')) {
            // Xóa ảnh cũ nếu có
            if ($photoPath && Storage::exists('public/' . $photoPath)) {
                Storage::delete('public/' . $photoPath);
            }

            // Lưu ảnh mới
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Cập nhật thông tin phòng
        $hotelRoom->update([
            'name' => $request->name,
            'price' => $request->price,
            'total_people' => $request->total_people,
            'photo' => $photoPath, // Cập nhật đường dẫn ảnh
        ]);

        return redirect()->route('admin.hotels.show', $hotelRoom->hotel)->with('success', 'Room updated successfully.'); // Quay lại trang quản lý khách sạn
    }

    public function destroy(Hotel $hotel, HotelRoom $hotelRoom)
    {
        // Xóa ảnh nếu có
        if ($hotelRoom->photo && Storage::exists('public/' . $hotelRoom->photo)) {
            Storage::delete('public/' . $hotelRoom->photo);
        }

        // Xóa phòng khỏi cơ sở dữ liệu
        $hotelRoom->delete();

        return redirect()->route('admin.hotels.show', $hotel)->with('success', 'Room deleted successfully.'); // Quay lại trang quản lý khách sạn
    }


}
