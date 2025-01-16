<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('hotels')->insert([

            [
                'name' => 'Hotel Lux',
                'slug' => 'hotel-lux',
                'thumbnail' => 'anhks.jpg',
                'address' => '123 Main Street, City A',
                'link_ggmaps' => 'https://maps.google.com/?q=Hotel+Lux',
                'start_level' => 5,
                'city_id' => 1,
                'country_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hotel Paradise',
                'slug' => 'hotel-paradise',
                'thumbnail' => 'anhks.jpg',
                'address' => '456 Ocean Drive, City B',
                'link_ggmaps' => 'https://maps.google.com/?q=Hotel+Paradise',
                'start_level' => 4,
                'city_id' => 2,
                'country_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain View Inn',
                'slug' => 'mountain-view-inn',
                'thumbnail' => 'anhks.jpg',
                'address' => '789 Hilltop Rd, City C',
                'link_ggmaps' => 'https://maps.google.com/?q=Mountain+View+Inn',
                'start_level' => 3,
                'city_id' => 3,
                'country_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urban Retreat Hotel',
                'slug' => 'urban-retreat-hotel',
                'thumbnail' => 'anhks.jpg',
                'address' => '101 City Center Blvd, City D',
                'link_ggmaps' => 'https://maps.google.com/?q=Urban+Retreat+Hotel',
                'start_level' => 4,
                'city_id' => 4,
                'country_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seaside Resort',
                'slug' => 'seaside-resort',
                'thumbnail' => 'anhks.jpg',
                'address' => '202 Beachside Lane, City E',
                'link_ggmaps' => 'https://maps.google.com/?q=Seaside+Resort',
                'start_level' => 5,
                'city_id' => 5,
                'country_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
