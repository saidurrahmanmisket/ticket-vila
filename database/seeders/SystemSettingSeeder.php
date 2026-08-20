<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('system_settings')->truncate();
        DB::table('social_media')->truncate();
        DB::table('f_a_q_s')->truncate();
        DB::table('teams')->truncate();
        DB::table('dynamic_pages')->truncate();
        DB::table('key_features')->truncate();
        DB::table('news')->truncate();
        DB::table('promo_codes')->truncate();

        DB::table('system_settings')->insert([
            'id' => 1,
            'system_name' => 'TicketVilla',
            'email' => 'support@ticketvilla.eu',
            'contact_number' => '+43 670 3535753',
            'address' => 'Dryadon, 1, Floor 1, 6041, Larnaca, Cyprus',
            'copy_rights_text' => '© 2026 TicketVilla Ltd. All rights reserved.',
            'logo' => 'frontend/images/logo.png',
            'favicon' => 'frontend/images/favicon.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('social_media')->insert([
            [
                'id' => 1,
                'name' => 'Facebook',
                'link' => 'https://facebook.com',
                'icon' => 'fa-brands fa-facebook',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Instagram',
                'link' => 'https://instagram.com',
                'icon' => 'fa-brands fa-instagram',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'YouTube',
                'link' => 'https://youtube.com',
                'icon' => 'fa-brands fa-youtube',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('f_a_q_s')->insert([
            [
                'id' => 1,
                'question_en' => 'How does the eBook Raffle work?',
                'question_de' => 'Wie funktioniert die E-Book-Verlosung?',
                'question_hu' => 'Hogyan működik az e-könyv sorsolás?',
                'answer_en' => 'When you purchase our eBook for €99, you receive a free raffle ticket for the dream home.',
                'answer_de' => 'Beim Kauf unseres E-Books für 99 € erhalten Sie ein kostenloses Los für das Traumhaus.',
                'answer_hu' => 'Amikor megvásárolja e-könyvünket 99 euróért, kap egy ingyenes sorsjegyet az álomházra.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'question_en' => 'Who is eligible to participate?',
                'question_de' => 'Wer ist teilnahmeberechtigt?',
                'question_hu' => 'Ki jogosult a részvételre?',
                'answer_en' => 'Anyone aged 18 or older worldwide can participate.',
                'answer_de' => 'Teilnehmen kann jeder ab 18 Jahren weltweit.',
                'answer_hu' => 'Bárki részt vehet a világon, aki betöltötte a 18. életévét.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('teams')->insert([
            [
                'id' => 1,
                'name' => 'Balazs Simon',
                'position' => 'Managing Director',
                'image' => 'frontend/images/team-1.png',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Sarah Connor',
                'position' => 'Marketing Head',
                'image' => 'frontend/images/team-2.png',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('dynamic_pages')->insert([
            [
                'id' => 1,
                'page_slug' => 'imprint',
                'title_en' => 'Imprint',
                'title_de' => 'Impressum',
                'title_hu' => 'Imprint',
                'sub_title_en' => 'Legal Information',
                'sub_title_de' => 'Rechtliche Informationen',
                'sub_title_hu' => 'Jogi információk',
                'description_en' => '<p><strong>Company Name:</strong> TICKETVILLA Ltd.</p><p><strong>Registered Office:</strong> Dryadon, 1, Floor 1, 6041, Larnaca, Cyprus</p>',
                'description_de' => '<p><strong>Firmenname:</strong> TICKETVILLA Ltd.</p>',
                'description_hu' => '<p><strong>Cégnév:</strong> TICKETVILLA Ltd.</p>',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'page_slug' => 'privacy-policy',
                'title_en' => 'Privacy Policy',
                'title_de' => 'Datenschutz',
                'title_hu' => 'Adatvédelmi irányelvek',
                'sub_title_en' => 'How we protect your data',
                'sub_title_de' => 'Wie wir Ihre Daten schützen',
                'sub_title_hu' => 'Hogyan védjük adatait',
                'description_en' => '<p>Your privacy is important to us. We adhere to strict GDPR standards.</p>',
                'description_de' => '<p>Ihr Datenschutz ist uns wichtig. Wir halten uns an DSGVO-Standards.</p>',
                'description_hu' => '<p>Az Ön adatainak védelme fontos számunkra.</p>',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('key_features')->insert([
            [
                'id' => 1,
                'title_en' => 'Notarized Purchase',
                'title_de' => 'Notariell beglaubigt',
                'title_hu' => 'Közjegyző által hitelesített',
                'gift_id' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title_en' => '100% Real & Fair',
                'title_de' => '100% ECHT & FAIR',
                'title_hu' => '100% Valódi és tisztességes',
                'gift_id' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('news')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title_en' => 'Dream Villa Raffle Officially Launched!',
                'title_de' => 'Traumvilla Verlosung offiziell gestartet!',
                'title_hu' => 'Az álomvilla sorsolás hivatalosan is elindult!',
                'description_en' => 'Get your eBook now to participate in our exclusive house draw in East Styria.',
                'description_de' => 'Holen Sie sich jetzt Ihr E-Book, um an unserer Hausverlosung in der Oststeiermark teilzunehmen.',
                'description_hu' => 'Szerezze be e-könyvét most a sorsoláshoz.',
                'image' => 'frontend/images/news-1.png',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('promo_codes')->insert([
            [
                'id' => 1,
                'code' => 'WELCOME10',
                'discount_percentage' => 10,
                'expires_at' => now()->addYear(),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'code' => 'SUMMER20',
                'discount_percentage' => 20,
                'expires_at' => now()->addYear(),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
