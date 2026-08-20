<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        DB::table('campaigns')->truncate();
        DB::table('gifts')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $giftId = DB::table('gifts')->insertGetId([
            'name_en' => 'Luxury Dream House Villa in Styria',
            'name_de' => 'Luxuriöse Traumhaus-Villa in der Steiermark',
            'name_hu' => 'Luxus Álomház Villa Stájerországban',
            'image' => 'user/images/ticket.png',
            'thumbnail_image' => 'user/images/ticket.png',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('campaigns')->insert([
            [
                'id' => 1,
                'name_en' => 'Buy EBook Get free Ticket',
                'name_de' => 'EBook kaufen Ticket kostenlos erhalten',
                'name_hu' => 'Vásároljon e-könyvet kapjon jegyet ingyen',
                'target_type' => '3',
                'limit' => 35000,
                'end_date_time' => now()->addMonths(6),
                'unique_text' => 'AB',
                'thumbnail' => 'user/images/ticket.png',
                'price' => 99.00,
                'gift_id' => $giftId,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name_en' => 'Pay one, Get The Second As a Gift',
                'name_de' => 'Einen bezahlen, den zweiten geschenkt bekommen',
                'name_hu' => 'Egyet fizet, a másodikat mi adjuk ajándékba',
                'target_type' => '3',
                'limit' => 20000,
                'end_date_time' => now()->addMonths(3),
                'unique_text' => 'AA',
                'thumbnail' => 'user/images/ticket.png',
                'price' => 49.00,
                'gift_id' => $giftId,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
