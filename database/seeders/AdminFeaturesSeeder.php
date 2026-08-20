<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminFeaturesSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        DB::table('house_files')->truncate();
        DB::table('highlight_images')->truncate();
        DB::table('ebook_descriptions')->truncate();
        DB::table('affiliate_files')->truncate();
        DB::table('affiliate_trips')->truncate();
        DB::table('products')->truncate();
        DB::table('gift_gallaries')->truncate();
        DB::table('gift_featured_items')->truncate();
        DB::table('tickets')->truncate();
        DB::table('orders')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // 1. Gift Galleries & Featured Items
        DB::table('gift_gallaries')->insert([
            [
                'id' => 1,
                'gift_id' => 1,
                'image' => 'user/images/ticket.png',
                'gift_image_type' => 'inside',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'gift_id' => 1,
                'image' => 'user/images/ticket.png',
                'gift_image_type' => 'outside',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('gift_featured_items')->insert([
            [
                'id' => 1,
                'gift_id' => 1,
                'title_en' => '4 Bedrooms & 3 Bathrooms',
                'title_de' => '4 Schlafzimmer & 3 Badezimmer',
                'title_hu' => '4 hálószoba és 3 fürdőszoba',
                'sub_title_en' => '250 m² modern living area',
                'sub_title_de' => '250 m² moderne Wohnfläche',
                'sub_title_hu' => '250 m² modern lakóterület',
                'image' => 'frontend/images/feature--book.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'gift_id' => 1,
                'title_en' => 'Private Swimming Pool',
                'title_de' => 'Privater Außenpool',
                'title_hu' => 'Saját úszómedence',
                'sub_title_en' => 'Heated outdoor pool with terrace',
                'sub_title_de' => 'Beheizter Außenpool mit Terrasse',
                'sub_title_hu' => 'Fűtött szabadtéri medence terasszal',
                'image' => 'frontend/images/feature--book.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2. House Files
        DB::table('house_files')->insert([
            [
                'id' => 1,
                'gift_id' => 1,
                'file_name_en' => 'Floor_Plan_Villa_Styria.pdf',
                'file_name_de' => 'Grundriss_Villa_Steiermark.pdf',
                'file_name_hu' => 'Alaprajz_Villa_Stajerorszag.pdf',
                'file_path' => 'uploads/house-files/sample.pdf',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'gift_id' => 1,
                'file_name_en' => 'Energy_Efficiency_Certificate.pdf',
                'file_name_de' => 'Energieausweis.pdf',
                'file_name_hu' => 'Energetikai_Tanusitvany.pdf',
                'file_path' => 'uploads/house-files/sample.pdf',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Highlight Images
        DB::table('highlight_images')->insert([
            [
                'id' => 1,
                'gift_id' => 1,
                'image' => 'user/images/ticket.png',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'gift_id' => 1,
                'image' => 'user/images/ticket.png',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4. Ebook Descriptions
        DB::table('ebook_descriptions')->insert([
            [
                'id' => 1,
                'campaign_id' => 1,
                'description_en' => 'Comprehensive guide to Styria Thermen region attractions and heritage.',
                'description_de' => 'Umfassender Reiseführer zur Steiermark Thermenregion.',
                'description_hu' => 'Részletes útmutató a stájerországi termálrégió látnivalóihoz.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 5. Affiliate Toolkit Files
        DB::table('affiliate_files')->insert([
            [
                'id' => 1,
                'title_en' => 'TicketVilla Official Promotional Banner Pack',
                'title_de' => 'Offizielles TicketVilla Werbebanner-Paket',
                'title_hu' => 'Hivatalos TicketVilla Promóciós Banner Csomag',
                'icon' => 'fa-solid fa-file-pdf',
                'file' => 'uploads/affiliate-files/banner-pack.zip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 6. Affiliate Tips & Tricks
        DB::table('affiliate_trips')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title_en' => 'How to Maximize Your Affiliate Sales on Social Media',
                'title_de' => 'So maximieren Sie Ihre Affiliate-Verkäufe in den sozialen Medien',
                'title_hu' => 'Hogyan maximalizálhatja partneri értékesítéseit a közösségi médiában',
                'image' => 'frontend/images/news-1.png',
                'description_en' => 'Share your custom affiliate link across Instagram stories, Facebook groups, and email newsletters to earn 15% commission per eBook sale.',
                'description_de' => 'Teilen Sie Ihren individuellen Affiliate-Link in Instagram-Stories und Facebook-Gruppen, um 15% Provision zu verdienen.',
                'description_hu' => 'Megoszthatja egyedi partnerhivatkozását az Instagramon és a Facebookon a 15%-os jutalékért.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 7. Products
        DB::table('products')->insert([
            [
                'id' => 1,
                'title' => 'Exploring Styria Thermen Region eBook (2024 Edition)',
                'description' => 'Official travel guide to Styria Thermen region.',
                'ebook' => 'uploads/ebooks/sample.pdf',
                'thumbnail' => 'user/images/ticket.png',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 8. Orders & Tickets
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => 2,
            'transaction_id' => 'TXN-9988776655',
            'quantity' => 1,
            'discount_quantity' => 0,
            'discount_percent' => 0,
            'total_price' => 99.00,
            'payment_method' => 'stripe',
            'invoice_no' => 'INV-2026-0001',
            'campaign_id' => 1,
            'payment_status' => 'completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tickets')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'order_id' => $orderId,
                'campaign_id' => 1,
                'ticket_number' => 'AB-100001',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
