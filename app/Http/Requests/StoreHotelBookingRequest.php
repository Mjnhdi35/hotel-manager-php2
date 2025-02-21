<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hotel_id' => ['required', 'exists:hotels,id'],
            'hotel_room_id' => ['required', 'exists:hotel_rooms,id'],
            'guest_name' => ['required', 'string', 'max:255'],
            'guest_email' => ['required', 'email'],
            'check_in_date' => ['required', 'date', 'after_or_equal:today'],
            'check_out_date' => ['required', 'date', 'after:check_in_date'],
            'number_of_guests' => ['required', 'integer', 'min:1'],
            'special_requests' => ['nullable', 'string'],
        ];
    }
}
