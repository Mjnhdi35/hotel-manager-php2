<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_rooms')->insert([
            [
                'hotel_id' => 14,
                'name' => 'Deluxe Room',
                'price' => 2000000,
                'total_people' => 2,
                'photo' => 'room1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 14,
                'name' => 'Family Suite',
                'price' => 3000000,
                'total_people' => 4,
                'photo' => 'room2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
