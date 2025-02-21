<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    public function index()
    {
        // Lấy danh sách các khách sạn cùng với thông tin thành phố, quốc gia và phòng
        $hotels = Hotel::with(['city', 'country', 'rooms'])->paginate(10);
        return view('admin.hotels.index', compact('hotels')); // Trả về view với danh sách khách sạn
    }

    public function create()
    {
        // Lấy danh sách thành phố và quốc gia để chọn khi tạo khách sạn
        $cities = City::all();
        $countries = Country::all();
        return view('admin.hotels.create', compact('cities', 'countries')); // Trả về view tạo khách sạn
    }

    public function store(Request $request)
    {
        // Validation dữ liệu đầu vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'address' => 'required|string|max:255', // Thêm validation cho address
            'link_ggmaps' => 'nullable|url', // Thêm validation cho link Google Maps
            'thumbnail' => 'nullable|image',
            'start_level' => 'required|integer|min:1|max:5',
        ]);

        // Xử lý upload thumbnail nếu có
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('hotels', 'public');
        }

        // Tạo slug từ tên khách sạn
        $validated['slug'] = Str::slug($validated['name']);


        // Tạo khách sạn mới trong cơ sở dữ liệu
        Hotel::create($validated);

        // Quay lại danh sách khách sạn với thông báo thành công
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel added successfully!');
    }

    public function show(Hotel $hotel)
    {
        // Tải danh sách phòng cho khách sạn
        $hotel->load('rooms');
        return view('admin.hotels.show', compact('hotel')); // Trả về view quản lý phòng khách sạn
    }

    public function edit(Hotel $hotel)
    {
        // Lấy danh sách thành phố và quốc gia để chỉnh sửa
        $cities = City::all();
        $countries = Country::all();
        return view('admin.hotels.edit', compact('hotel', 'cities', 'countries')); // Trả về view chỉnh sửa thông tin khách sạn
    }

    public function update(Request $request, Hotel $hotel)
    {
        // Validation dữ liệu đầu vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'address' => 'required|string|max:255', // Thêm validation cho address
            'link_ggmaps' => 'nullable|url', // Thêm validation cho link Google Maps
            'thumbnail' => 'nullable|image',
            'start_level' => 'required|integer|min:1|max:5',
        ]);

        // Xử lý upload thumbnail nếu có
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('hotels', 'public');
        }

        // Tạo slug từ tên khách sạn
        $validated['slug'] = Str::slug($validated['name']);

        // Cập nhật thông tin khách sạn
        $hotel->update($validated);

        // Quay lại danh sách khách sạn với thông báo thành công
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully!');
    }

    public function destroy(Hotel $hotel)
    {
        // Xóa khách sạn
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully!');
    }
}
