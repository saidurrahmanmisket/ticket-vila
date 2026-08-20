<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RichDataSeeder extends Seeder
{
    public function run(): void
    {
        $schema = \Illuminate\Support\Facades\Schema::class;
        $schema::disableForeignKeyConstraints();

        // Truncate all tables we will re-seed
        DB::table('tickets')->truncate();
        DB::table('orders')->truncate();
        DB::table('visitors')->truncate();
        DB::table('ebook_descriptions')->truncate();
        DB::table('affiliate_files')->truncate();
        DB::table('affiliate_trips')->truncate();
        DB::table('products')->truncate();
        DB::table('gift_gallaries')->truncate();
        DB::table('gift_featured_items')->truncate();
        DB::table('house_files')->truncate();
        DB::table('highlight_images')->truncate();
        DB::table('f_a_q_s')->truncate();
        DB::table('teams')->truncate();
        DB::table('news')->truncate();
        DB::table('dynamic_pages')->truncate();
        DB::table('key_features')->truncate();
        DB::table('promo_codes')->truncate();
        DB::table('social_media')->truncate();
        DB::table('campaigns')->truncate();
        DB::table('gifts')->truncate();

        $schema::enableForeignKeyConstraints();

        // ─── USERS (extra fake users) ────────────────────────────────────
        $extraUsers = [];
        $names = [
            ['Klaus','Müller'], ['Anna','Schmidt'], ['Peter','Wagner'],
            ['Maria','Fischer'], ['Johann','Bauer'], ['Sophie','Huber'],
            ['Thomas','Gruber'], ['Laura','Hofer'], ['Michael','Maier'],
            ['Emma','Steiner'], ['Lukas','Moser'], ['Hannah','Wolf'],
        ];
        $existingMax = DB::table('users')->max('id') ?? 2;
        foreach ($names as $i => [$first, $last]) {
            $uid = $existingMax + $i + 1;
            DB::table('users')->insertOrIgnore([
                'id'                => $uid,
                'first_name'        => $first,
                'last_name'         => $last,
                'email'             => strtolower($first . '.' . $last . $uid . '@example.com'),
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'created_at'        => now()->subDays(rand(1, 200)),
                'updated_at'        => now(),
            ]);
        }

        // ─── GIFTS ───────────────────────────────────────────────────────
        $giftData = [
            [1, 'Luxury Dream House – Villa Söchau',  'Luxuriöse Traumvilla – Söchau',     'Luxus Álomház – Söchau',     '4+1 rooms, 250 m², pool', '4+1 Zimmer, 250 m², Pool', '4+1 szoba, 250 m², medence'],
            [2, 'Modern Country Estate – East Styria','Modernes Landgut – Oststeiermark',   'Modern Vidéki Birtok – Kelet-Stájerország', '6 rooms, 380 m², sauna', '6 Zimmer, 380 m², Sauna', '6 szoba, 380 m², szauna'],
            [3, 'Alpine Chalet – Schladming',          'Alpenchalet – Schladming',           'Alpesi Chalet – Schladming',  '3 rooms, 180 m², mountain view', '3 Zimmer, 180 m², Bergblick', '3 szoba, 180 m², hegykilátás'],
        ];
        foreach ($giftData as [$id, $en, $de, $hu, $subEn, $subDe, $subHu]) {
            DB::table('gifts')->insert([
                'id'              => $id,
                'name_en'         => $en,
                'name_de'         => $de,
                'name_hu'         => $hu,
                'image'           => 'user/images/ticket.png',
                'thumbnail_image' => 'user/images/ticket.png',
                'status'          => 'active',
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }

        // ─── CAMPAIGNS ───────────────────────────────────────────────────
        $campaigns = [
            [1,  1, 'Buy EBook – Get Free Raffle Ticket',          'EBook kaufen – Gratis Raffle-Los',     'EBook vásárlás – Ingyenes Raffle Jegy',  'AB', 99.00,  35000, 6],
            [2,  1, 'Buy 1 Get 1 Free',                            'Kaufe 1 erhalte 1 Gratis',             '1 vásárlás 1 ingyen',                    'AA', 49.00,  20000, 3],
            [3,  2, 'Premium Country Estate Raffle',               'Premium Landgut Verlosung',            'Prémium Vidéki Birtok Sorsolás',          'PE', 149.00, 10000, 9],
            [4,  2, 'Early Bird Special – 20% Off',               'Frühbucher-Sonderangebot',             'Korai Foglalás – 20% Kedvezmény',         'EB', 79.00,  15000, 4],
            [5,  3, 'Alpine Chalet Dream Package',                 'Alpenchalet Traumpaket',               'Alpesi Chalet Álomcsomag',                'AC', 199.00, 5000,  12],
        ];
        foreach ($campaigns as [$id, $gid, $en, $de, $hu, $utxt, $price, $limit, $months]) {
            DB::table('campaigns')->insert([
                'id'            => $id,
                'name_en'       => $en,
                'name_de'       => $de,
                'name_hu'       => $hu,
                'target_type'   => '3',
                'limit'         => $limit,
                'end_date_time' => now()->addMonths($months),
                'unique_text'   => $utxt,
                'thumbnail'     => 'user/images/ticket.png',
                'price'         => $price,
                'gift_id'       => $gid,
                'status'        => 'published',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        // ─── GIFT GALLERIES ──────────────────────────────────────────────
        $galTypes = ['inside', 'outside', 'inside', 'outside', 'inside', 'outside'];
        $gId = 1;
        foreach ([1, 2, 3] as $giftId) {
            foreach (['inside', 'outside', 'inside', 'outside'] as $type) {
                DB::table('gift_gallaries')->insert([
                    'id'             => $gId++,
                    'gift_id'        => $giftId,
                    'image'          => 'user/images/ticket.png',
                    'gift_image_type'=> $type,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            }
        }

        // ─── GIFT FEATURED ITEMS ─────────────────────────────────────────
        $featuredItems = [
            [1, 1, '4+1 Bedrooms', '4+1 Schlafzimmer', '4+1 Hálószoba', 'Spacious & bright rooms', 'Geräumige, helle Zimmer', 'Tágas, világos szobák'],
            [2, 1, 'Private Pool', 'Privater Pool', 'Saját Medence', 'Heated outdoor pool 8x4m', 'Beheizter Außenpool 8x4m', 'Fűtött szabadtéri medence 8x4m'],
            [3, 1, 'Modern Kitchen', 'Moderne Küche', 'Modern Konyha', 'Fully equipped chef kitchen', 'Voll ausgestattete Küche', 'Teljesen felszerelt konyha'],
            [4, 1, 'Double Garage', 'Doppelgarage', 'Dupla Garázs', 'Secure 2-car garage', 'Sichere 2-Auto-Garage', 'Biztonságos 2 autós garázs'],
            [5, 1, 'Landscaped Garden', 'Gepflegter Garten', 'Gondozott Kert', '1200 m² beautiful garden', '1200 m² schöner Garten', '1200 m² gyönyörű kert'],
            [6, 2, '6 Bedrooms', '6 Schlafzimmer', '6 Hálószoba', 'Master suite & en-suite rooms', 'Master Suite & En-Suite', 'Mester lakosztály és szobák'],
            [7, 2, 'Wine Cellar', 'Weinkeller', 'Borospince', 'Traditional Styrian wine cellar', 'Steirischer Weinkeller', 'Stájer borospince'],
            [8, 3, 'Ski-in Ski-out', 'Ski-in Ski-out', 'Síes csomag', 'Direct slope access', 'Direkter Pistenzugang', 'Közvetlen pályahozzáférés'],
        ];
        foreach ($featuredItems as [$id, $gId, $enT, $deT, $huT, $enS, $deS, $huS]) {
            DB::table('gift_featured_items')->insert([
                'id'          => $id, 'gift_id' => $gId,
                'title_en'    => $enT, 'title_de' => $deT, 'title_hu' => $huT,
                'sub_title_en'=> $enS, 'sub_title_de' => $deS, 'sub_title_hu' => $huS,
                'image'       => 'frontend/images/feature--book.svg',
                'created_at'  => now(), 'updated_at' => now(),
            ]);
        }

        // ─── HOUSE FILES ─────────────────────────────────────────────────
        $houseFiles = [
            [1, 1, 'Floor_Plan_Villa_Söchau.pdf',      'Grundriss_Villa_Söchau.pdf',       'Alaprajz_Villa_Söchau.pdf'],
            [2, 1, 'Energy_Certificate_2024.pdf',      'Energieausweis_2024.pdf',          'Energetikai_Tanusitvany_2024.pdf'],
            [3, 1, 'Property_Legal_Documents.pdf',     'Eigentumsunterlagen.pdf',          'Tulajdoni_Lapok.pdf'],
            [4, 1, 'Building_Permit.pdf',              'Baugenehmigung.pdf',               'Epitesi_Engedely.pdf'],
            [5, 2, 'Floor_Plan_Country_Estate.pdf',    'Grundriss_Landgut.pdf',            'Alaprajz_Videki_Birtok.pdf'],
            [6, 2, 'Survey_Report_Estate.pdf',         'Vermessungsbericht.pdf',           'Felmérési_Jelentes.pdf'],
            [7, 3, 'Chalet_Floor_Plan.pdf',            'Chalet_Grundriss.pdf',             'Chalet_Alaprajz.pdf'],
            [8, 3, 'Alpine_Property_Certificate.pdf',  'Alpines_Eigentumszeugnis.pdf',     'Alpesi_Ingatlan_Tanusitvany.pdf'],
        ];
        foreach ($houseFiles as [$id, $gId, $en, $de, $hu]) {
            DB::table('house_files')->insert([
                'id' => $id, 'gift_id' => $gId,
                'file_name_en' => $en, 'file_name_de' => $de, 'file_name_hu' => $hu,
                'file_path' => 'uploads/house-files/sample.pdf',
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── HIGHLIGHT IMAGES ────────────────────────────────────────────
        for ($i = 1; $i <= 8; $i++) {
            DB::table('highlight_images')->insert([
                'id'         => $i,
                'gift_id'    => ($i <= 4) ? 1 : (($i <= 6) ? 2 : 3),
                'image'      => 'user/images/ticket.png',
                'status'     => 'active',
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now(),
            ]);
        }

        // ─── KEY FEATURES ────────────────────────────────────────────────
        $keyFeatures = [
            [1, 1, 'Notarized Purchase',    'Notariell beglaubigt',   'Közjegyző által hitelesített'],
            [2, 1, '100% Legal & Secure',   '100% Legal & Sicher',    '100% Jogszerű és biztonságos'],
            [3, 1, 'No Hidden Costs',       'Keine versteckten Kosten','Nincsenek rejtett költségek'],
            [4, 1, 'Equal Chances',         'Gleiche Chancen',        'Egyenlő esélyek'],
            [5, 1, 'Transparent Raffle',    'Transparente Verlosung', 'Átlátható sorsolás'],
            [6, 2, 'Notarized Transfer',    'Notariell beglaubigt',   'Közjegyzői átruházás'],
            [7, 2, 'All-Inclusive Prize',   'All-Inclusive Preis',    'Mindent magában foglaló díj'],
        ];
        foreach ($keyFeatures as [$id, $gId, $en, $de, $hu]) {
            DB::table('key_features')->insert([
                'id' => $id, 'gift_id' => $gId,
                'title_en' => $en, 'title_de' => $de, 'title_hu' => $hu,
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── FAQs ────────────────────────────────────────────────────────
        $faqs = [
            [1, 'How does the raffle work?', 'Wie funktioniert die Verlosung?', 'Hogyan működik a sorsolás?',
                'Purchase our eBook for €99 and receive a free raffle ticket. Once all tickets are sold, a notarized draw determines the winner.',
                'Kaufen Sie unser E-Book für 99 € und erhalten Sie ein kostenloses Raffle-Los.',
                'Vásárolja meg e-könyvünket 99 euróért, és kapjon egy ingyenes sorsjegyet.'],
            [2, 'Who can participate?', 'Wer kann teilnehmen?', 'Ki vehet részt?',
                'Anyone aged 18 or older worldwide can participate by purchasing our eBook.',
                'Jeder ab 18 Jahren weltweit kann durch den Kauf unseres E-Books teilnehmen.',
                'Bárki részt vehet a világon, aki betöltötte a 18. életévét.'],
            [3, 'How is the winner selected?', 'Wie wird der Gewinner ausgewählt?', 'Hogyan választják ki a nyertest?',
                'The winner is selected through a fully transparent, notarized draw process verified by an independent notary.',
                'Der Gewinner wird durch eine vollständig transparente, notarielle Auslosung ermittelt.',
                'A nyertest egy teljesen átlátható, közjegyző által hitelesített sorsoláson választják ki.'],
            [4, 'What does the winner receive?', 'Was erhält der Gewinner?', 'Mit kap a nyertes?',
                'The winner receives the fully furnished dream home including all legal transfer costs, notary fees, and property taxes.',
                'Der Gewinner erhält das vollständig möblierte Traumhaus inklusive aller Übertragungskosten.',
                'A nyertes megkapja a teljesen berendezett álomházat, beleértve az összes átruházási költséget.'],
            [5, 'Is this legal?', 'Ist das legal?', 'Ez legális?',
                'Yes, TicketVilla operates fully within EU law. All draws are notarized and legally compliant.',
                'Ja, TicketVilla operiert vollständig im Rahmen des EU-Rechts.',
                'Igen, a TicketVilla teljes mértékben az EU jogszabályainak megfelelően működik.'],
            [6, 'How do I receive my eBook?', 'Wie erhalte ich mein E-Book?', 'Hogyan kapom meg az e-könyvet?',
                'After successful payment, the eBook is instantly delivered to your registered email address.',
                'Nach erfolgreicher Zahlung wird das E-Book sofort an Ihre registrierte E-Mail gesendet.',
                'Sikeres fizetés után az e-könyv azonnal elküldésre kerül a regisztrált e-mail-jére.'],
            [7, 'Can I buy multiple tickets?', 'Kann ich mehrere Lose kaufen?', 'Vehetek több jegyet?',
                'Yes, you may purchase multiple eBooks to increase your chances. Each purchase grants one raffle ticket.',
                'Ja, Sie können mehrere E-Books kaufen, um Ihre Chancen zu erhöhen.',
                'Igen, több e-könyvet is vásárolhat az esélyei növelése érdekében.'],
            [8, 'What payment methods are accepted?', 'Welche Zahlungsmethoden werden akzeptiert?', 'Milyen fizetési módok elfogadottak?',
                'We accept all major credit cards, PayPal, SOFORT, and other EU payment methods via our secure Stripe gateway.',
                'Wir akzeptieren alle gängigen Kreditkarten, PayPal und SOFORT über Stripe.',
                'Elfogadunk minden nagyobb hitelkártyát, PayPal-t és SOFORT-ot a Stripe rendszerén keresztül.'],
            [9, 'Is my personal data secure?', 'Sind meine persönlichen Daten sicher?', 'Biztonságban vannak személyes adataim?',
                'We are fully GDPR compliant. Your data is encrypted and never shared with third parties.',
                'Wir sind vollständig DSGVO-konform. Ihre Daten sind verschlüsselt.',
                'Teljes mértékben GDPR-kompatibilisek vagyunk. Adatait titkosítjuk.'],
            [10, 'When will the draw take place?', 'Wann findet die Auslosung statt?', 'Mikor kerül sor a sorsolásra?',
                'The draw takes place once all raffle tickets are sold or the campaign deadline is reached.',
                'Die Auslosung findet statt, sobald alle Lose verkauft oder die Frist erreicht sind.',
                'A sorsolásra akkor kerül sor, ha az összes jegyet eladták vagy elérték a határidőt.'],
        ];
        foreach ($faqs as [$id, $qEn, $qDe, $qHu, $aEn, $aDe, $aHu]) {
            DB::table('f_a_q_s')->insert([
                'id' => $id,
                'question_en' => $qEn, 'question_de' => $qDe, 'question_hu' => $qHu,
                'answer_en' => $aEn, 'answer_de' => $aDe, 'answer_hu' => $aHu,
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── TEAM MEMBERS ─────────────────────────────────────────────────
        $team = [
            [1, 'Balazs Simon',    'CEO & Managing Director',   'Vezérigazgató'],
            [2, 'Sarah Wagner',    'Head of Marketing',          'Marketing vezető'],
            [3, 'Michael Gruber',  'Legal Affairs Director',     'Jogi igazgató'],
            [4, 'Anna Müller',     'Customer Success Manager',   'Ügyfélsikeres menedzser'],
            [5, 'Thomas Fischer',  'Head of Technology',         'Technológiai vezető'],
            [6, 'Laura Hofer',     'Campaign Coordinator',       'Kampánykoordinátor'],
            [7, 'Johann Bauer',    'Property Valuations Expert', 'Ingatlanértékelési szakértő'],
            [8, 'Emma Schmidt',    'Affiliate Program Manager',  'Affiliate Program Menedzser'],
        ];
        foreach ($team as [$id, $name, $pos, $posHu]) {
            DB::table('teams')->insert([
                'id' => $id, 'name' => $name, 'position' => $pos,
                'image' => 'user/images/ticket.png',
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── NEWS ─────────────────────────────────────────────────────────
        $newsData = [
            [1, 1, 'Dream Villa Raffle Officially Launched!',
                'Traumvilla Verlosung offiziell gestartet!',
                'Az álomvilla sorsolás hivatalosan is elindult!',
                'TicketVilla is thrilled to announce the official launch of the Söchau dream villa raffle. Get your eBook today!',
                'TicketVilla freut sich, den offiziellen Start der Söchau Traumvilla Verlosung bekannt zu geben.',
                'A TicketVilla örömmel jelenti be a söchaui álomvilla sorsolás hivatalos elindulását.'],
            [2, 1, 'New Campaign: Buy 1 Get 1 Free',
                'Neue Kampagne: Kaufe 1 erhalte 1 Gratis',
                'Új kampány: 1 vásárlásnál 1 ingyen',
                'For a limited time, purchase one eBook and receive a second raffle ticket absolutely free!',
                'Für begrenzte Zeit kaufen Sie ein E-Book und erhalten ein zweites Los gratis!',
                'Korlátozott ideig vásároljon egy e-könyvet és kapjon egy második sorsjegyet ingyenesen!'],
            [3, 1, 'TicketVilla Reaches 5,000 Ticket Milestone',
                'TicketVilla erreicht Meilenstein von 5.000 Losen',
                'A TicketVilla elérte az 5 000 jegy mérföldkövét',
                'We are excited to announce that we have sold over 5,000 raffle tickets. The dream is getting closer!',
                'Wir freuen uns bekannt zu geben, dass wir über 5.000 Raffle-Lose verkauft haben.',
                'Izgatottan jelentjük be, hogy több mint 5 000 sorsjegyet adtunk el.'],
            [4, 1, 'New Property Added: Alpine Chalet in Schladming',
                'Neue Immobilie: Alpenchalet in Schladming',
                'Új ingatlan: Alpesi Chalet Schladmingban',
                'We are adding a stunning alpine chalet in Schladming to our prize portfolio for our newest campaign.',
                'Wir fügen unserem Preisportfolio ein atemberaubendes Alpenchalet in Schladming hinzu.',
                'Egy lenyűgöző alpesi chalettel bővítjük díjportfóliónkat Schladmingban.'],
            [5, 1, 'Winner Interview: Last Season\'s Dream Home Winner',
                'Gewinnerinterview: Traumhausgewinner der letzten Saison',
                'Nyertes interjú: Az előző szezon álomháza nyertese',
                'We sat down with last season\'s winner to talk about how it feels to win a dream home through TicketVilla.',
                'Wir haben uns mit dem Gewinner der letzten Saison zusammengesetzt.',
                'Leültünk az előző szezon nyertesével, hogy megbeszéljük, milyen érzés nyerni.'],
            [6, 1, 'Summer Promo: Save 20% on All eBooks',
                'Sommer-Promo: 20% auf alle E-Books sparen',
                'Nyári Promo: 20% megtakarítás minden e-könyvnél',
                'This summer, use code SUMMER20 at checkout to save 20% on any eBook purchase.',
                'Diesen Sommer verwenden Sie Code SUMMER20 für 20% Rabatt.',
                'Ezen a nyáron használja a SUMMER20 kódot 20% megtakarításhoz.'],
            [7, 1, 'TicketVilla Partners with Austrian Notary Association',
                'TicketVilla kooperiert mit der Österreichischen Notariatskammer',
                'A TicketVilla együttműködik az Osztrák Közjegyzői Kamarával',
                'We are proud to announce our partnership with the Austrian Notary Association ensuring fully transparent draws.',
                'Wir sind stolz auf unsere Partnerschaft mit der Österreichischen Notariatskammer.',
                'Büszkén jelentjük be partnerségünket az Osztrák Közjegyzői Kamarával.'],
        ];
        foreach ($newsData as [$id, $uid, $enT, $deT, $huT, $enD, $deD, $huD]) {
            DB::table('news')->insert([
                'id' => $id, 'user_id' => $uid,
                'title_en' => $enT, 'title_de' => $deT, 'title_hu' => $huT,
                'description_en' => $enD, 'description_de' => $deD, 'description_hu' => $huD,
                'image' => 'user/images/ticket.png',
                'status' => 'active',
                'created_at' => now()->subDays(rand(1, 90)), 'updated_at' => now(),
            ]);
        }

        // ─── SOCIAL MEDIA ─────────────────────────────────────────────────
        $socials = [
            [1, 'Facebook',  'https://facebook.com/ticketvilla',  'fa-brands fa-facebook'],
            [2, 'Instagram', 'https://instagram.com/ticketvilla', 'fa-brands fa-instagram'],
            [3, 'YouTube',   'https://youtube.com/@ticketvilla',  'fa-brands fa-youtube'],
            [4, 'TikTok',    'https://tiktok.com/@ticketvilla',   'fa-brands fa-tiktok'],
            [5, 'LinkedIn',  'https://linkedin.com/company/ticketvilla', 'fa-brands fa-linkedin'],
            [6, 'Twitter',   'https://twitter.com/ticketvilla',   'fa-brands fa-twitter'],
        ];
        foreach ($socials as [$id, $name, $link, $icon]) {
            DB::table('social_media')->insert([
                'id' => $id, 'name' => $name, 'link' => $link, 'icon' => $icon,
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── DYNAMIC PAGES ────────────────────────────────────────────────
        $pages = [
            [1, 'imprint', 'Imprint', 'Impressum', 'Imprint',
                '<p><strong>Company:</strong> TICKETVILLA Ltd.</p><p><strong>Registered Office:</strong> Dryadon, 1, Floor 1, 6041, Larnaca, Cyprus</p><p><strong>Email:</strong> support@ticketvilla.eu</p><p><strong>VAT:</strong> EL801623754</p>',
                '<p><strong>Unternehmen:</strong> TICKETVILLA Ltd.</p><p>Dryadon, 1, Floor 1, 6041, Larnaca, Zypern</p>',
                '<p><strong>Cég:</strong> TICKETVILLA Ltd.</p><p>Dryadon, 1, Floor 1, 6041, Larnaka, Ciprus</p>'],
            [2, 'privacy-policy', 'Privacy Policy', 'Datenschutz', 'Adatvédelmi irányelvek',
                '<p>TicketVilla is committed to protecting your privacy. We collect only the data necessary to provide our service and comply fully with GDPR regulations. Your data is never sold to third parties. You have the right to request deletion of your data at any time by contacting support@ticketvilla.eu.</p>',
                '<p>TicketVilla ist dem Schutz Ihrer Privatsphäre verpflichtet und entspricht vollständig der DSGVO.</p>',
                '<p>A TicketVilla elkötelezett az Ön adatainak védelme mellett, és teljes mértékben megfelel a GDPR előírásainak.</p>'],
            [3, 'terms-conditions', 'Terms & Conditions', 'Allgemeine Geschäftsbedingungen', 'Általános Szerződési Feltételek',
                '<p>By purchasing an eBook from TicketVilla, you agree to participate in our raffle according to the rules set out here. The raffle is open to all participants aged 18+. TicketVilla reserves the right to change campaign terms with prior notice.</p>',
                '<p>Mit dem Kauf eines E-Books bei TicketVilla stimmen Sie unseren Teilnahmebedingungen zu.</p>',
                '<p>Az TicketVilla-tól e-könyv vásárlásával elfogadja a sorsolás feltételeit.'],
            [4, 'cookie-policy', 'Cookie Policy', 'Cookie-Richtlinie', 'Cookie Szabályzat',
                '<p>We use essential cookies to ensure our website functions correctly and analytical cookies to improve your experience. You may opt out of analytical cookies at any time via our cookie banner.</p>',
                '<p>Wir verwenden notwendige Cookies für die Funktionalität unserer Website und analytische Cookies zur Verbesserung Ihres Erlebnisses.</p>',
                '<p>Alapvető sütiket használunk a weboldal megfelelő működéséhez, valamint analitikai sütiket a felhasználói élmény javításához.'],
        ];
        foreach ($pages as [$id, $slug, $enT, $deT, $huT, $enD, $deD, $huD]) {
            DB::table('dynamic_pages')->insert([
                'id' => $id, 'page_slug' => $slug,
                'title_en' => $enT, 'title_de' => $deT, 'title_hu' => $huT,
                'description_en' => $enD, 'description_de' => $deD, 'description_hu' => $huD,
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── PROMO CODES ─────────────────────────────────────────────────
        $promoCodes = [
            [1, 'WELCOME10',  10, 1000, 100],
            [2, 'SUMMER20',   20,  500,  50],
            [3, 'VIP30',      30,  200,  20],
            [4, 'LAUNCH15',   15,  800,  80],
            [5, 'FRIEND5',     5, 2000, 200],
            [6, 'EARLYBIRD25', 25, 300,  30],
            [7, 'NEWUSER10',   10, 1500, 150],
        ];
        foreach ($promoCodes as [$id, $code, $pct, $limit, $max]) {
            DB::table('promo_codes')->insert([
                'id' => $id, 'code' => $code,
                'discount_percentage' => $pct,
                'expires_at' => now()->addYear(),
                'usage_limit' => $limit,
                'max_quantity' => $max,
                'status' => 'active',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── EBOOK DESCRIPTIONS ───────────────────────────────────────────
        $ebookDescs = [
            [1, 1, 'Discover the best thermal spas and hidden gems of East Styria in our exclusive travel guide. Packed with local tips, history, and must-visit destinations.',
                'Entdecken Sie die besten Thermen und versteckten Perlen der Oststeiermark in unserem exklusiven Reiseführer.',
                'Fedezze fel Kelet-Stájerország legjobb termálfürdőit és rejtett gyöngyeit exkluzív útmutatónkban.'],
            [2, 1, 'Our eBook covers the unique culture of the Fürstenfeld region, including local festivals, traditional cuisine, wine routes, and wellness experiences.',
                'Unser E-Book behandelt die einzigartige Kultur der Region Fürstenfeld, einschließlich lokaler Feste und traditioneller Küche.',
                'E-könyvünk a Fürstenfeld régió egyedülálló kultúráját mutatja be, beleértve a helyi fesztiválokat és hagyományos konyhát.'],
            [3, 2, 'Explore the most exclusive estates and lifestyle destinations in East Styria. A premium guide for discerning travellers and investors.',
                'Entdecken Sie die exklusivsten Güter und Lifestyle-Ziele der Oststeiermark.',
                'Fedezze fel Kelet-Stájerország legexkluzívabb birtokait és életstílus célpontjait.'],
            [4, 3, 'Alpine adventures await! From skiing and hiking to cozy chalets – the complete guide to the Schladming-Dachstein region.',
                'Alpinabenteuer warten! Vom Skifahren und Wandern bis hin zu gemütlichen Chalets – der vollständige Führer.',
                'Alpesi kalandok várnak! A síeléstől és túrázástól a hangulatos chaletokig – a Schladming-Dachstein régió teljes útmutatója.'],
        ];
        foreach ($ebookDescs as [$id, $camId, $enD, $deD, $huD]) {
            DB::table('ebook_descriptions')->insert([
                'id' => $id, 'campaign_id' => $camId,
                'description_en' => $enD, 'description_de' => $deD, 'description_hu' => $huD,
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── AFFILIATE TOOLKIT FILES ──────────────────────────────────────
        $affFiles = [
            [1, 'Social Media Banner Pack (1080x1080)',       'Social-Media-Banner-Paket',      'Közösségi Média Banner Csomag'],
            [2, 'Email Newsletter Template',                   'E-Mail-Newsletter-Vorlage',      'E-Mail Hírlevél Sablon'],
            [3, 'Landing Page Marketing Copy',                 'Landingpage-Marketingtext',      'Céloldal Marketing Szöveg'],
            [4, 'YouTube/Instagram Story Assets',              'YouTube/Instagram Story Assets', 'YouTube/Instagram Sztori Anyagok'],
            [5, 'Affiliate Program Complete Guide PDF',        'Affiliate-Programm Handbuch',    'Affiliate Program Teljes Útmutató'],
            [6, 'High-Resolution Product Photos',             'Hochauflösende Produktfotos',     'Nagy Felbontású Termékfotók'],
        ];
        foreach ($affFiles as [$id, $enT, $deT, $huT]) {
            DB::table('affiliate_files')->insert([
                'id' => $id,
                'title_en' => $enT, 'title_de' => $deT, 'title_hu' => $huT,
                'icon' => 'fa-solid fa-file-pdf',
                'file' => 'uploads/affiliate-files/sample.zip',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── AFFILIATE TIPS & TRICKS ──────────────────────────────────────
        $affTrips = [
            [1, 'Maximize Social Media Sales',           'Social-Media-Verkäufe maximieren',          'Közösségi Média Értékesítés Maximalizálása',
                'Share your unique affiliate link via Instagram stories, Facebook groups, Reels and YouTube Shorts to reach the widest audience and earn 15% on every sale.',
                'Teilen Sie Ihren einzigartigen Affiliate-Link über Instagram-Stories, Facebook-Gruppen und YouTube Shorts.',
                'Ossza meg egyedi partnerhivatkozását Instagram-sztorikon, Facebook csoportokon és YouTube Shorts-on.'],
            [2, 'Email Marketing Best Practices',        'E-Mail-Marketing-Best-Practices',           'E-Mail Marketing Bevált Módszerek',
                'Build a targeted email list of people interested in real estate and luxury properties. Send monthly newsletters with your affiliate link and exclusive offers.',
                'Erstellen Sie eine gezielte E-Mail-Liste von Personen, die an Immobilien interessiert sind.',
                'Hozzon létre célzott e-mail listát ingatlan iránt érdeklődő személyekből.'],
            [3, 'Create Engaging Video Content',         'Ansprechende Video-Inhalte erstellen',       'Lebilincselő Videótartalom Készítése',
                'Film a 60-second tour-style video about the prize property and post it with your affiliate link in the description. Videos drive 3x more conversions than images.',
                'Filmen Sie ein 60-Sekunden-Tour-Video über die Gewinnimmobilie und posten Sie es mit Ihrem Affiliate-Link.',
                'Készítsen egy 60 másodperces körtúra-stílusú videót a nyereményingatlanról.'],
            [4, 'Leverage Your Personal Network',        'Ihr persönliches Netzwerk nutzen',          'Személyes Hálózat Kihasználása',
                'Personal recommendations from friends and family convert at 4-5x higher rate. Tell your contacts about TicketVilla and share your link personally.',
                'Persönliche Empfehlungen von Freunden und Familie konvertieren 4-5x besser.',
                'A barátok és família személyes ajánlásai 4-5-szer magasabb arányban konvertálnak.'],
            [5, 'Run Targeted Facebook Ads',             'Gezielte Facebook-Anzeigen schalten',        'Célzott Facebook Hirdetések Futtatása',
                'Use Facebook Ads Manager to target users aged 25-55 interested in real estate, luxury goods, and investments in Austria, Germany, and Hungary.',
                'Verwenden Sie den Facebook Ads Manager, um Nutzer im Alter von 25-55 Jahren gezielt anzusprechen.',
                'Használja a Facebook Ads Managert a 25-55 éves felhasználók célzásához.'],
            [6, 'Blog & SEO Content Strategy',           'Blog- und SEO-Inhaltsstrategie',            'Blog és SEO Tartalom Stratégia',
                'Write SEO-optimized blog posts about "win a house" or "property raffle Europe" topics and embed your affiliate link to generate passive organic traffic.',
                'Schreiben Sie SEO-optimierte Blogbeiträge zu Themen wie "Haus gewinnen" und betten Sie Ihren Affiliate-Link ein.',
                'Írjon SEO-optimalizált blogbejegyzéseket "ház nyerés" témákban és ágyazza be partnerhivatkozását.'],
        ];
        foreach ($affTrips as [$id, $enT, $deT, $huT, $enD, $deD, $huD]) {
            DB::table('affiliate_trips')->insert([
                'id' => $id, 'user_id' => 1,
                'title_en' => $enT, 'title_de' => $deT, 'title_hu' => $huT,
                'image' => 'user/images/ticket.png',
                'description_en' => $enD, 'description_de' => $deD, 'description_hu' => $huD,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── PRODUCTS ────────────────────────────────────────────────────
        $products = [
            [1, 'Exploring Styria Thermen Region 2024',           'Official travel eBook with raffle ticket included.'],
            [2, 'East Styria Country Estate Premium Guide',        'Luxury travel guide for East Styria country estates.'],
            [3, 'Alpine Chalet Guide – Schladming & Surroundings', 'Complete alpine lifestyle and skiing guide.'],
        ];
        foreach ($products as [$id, $title, $desc]) {
            DB::table('products')->insert([
                'id' => $id, 'title' => $title, 'description' => $desc,
                'ebook' => 'uploads/ebooks/sample.pdf',
                'thumbnail' => 'user/images/ticket.png',
                'status' => 'active', 'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ─── ORDERS & TICKETS ────────────────────────────────────────────
        // ─── ORDERS & TICKETS (Generate 200 random tickets sold) ──────────
        $prefixes = ['AB', 'AA', 'PE', 'EB', 'AC'];
        $userCount = 13; // We have up to ID 14 (1 Admin + 13 users)
        
        for ($i = 1; $i <= 200; $i++) {
            $uid = rand(2, $userCount); // Random user ID (excluding admin)
            $camId = rand(1, 5); // Random campaign ID (1 to 5)
            $prices = [1 => 99.00, 2 => 49.00, 3 => 149.00, 4 => 79.00, 5 => 199.00];
            $price = $prices[$camId];
            $qty = rand(1, 3); // Random quantity 1-3
            $total = $price * $qty;

            $oid = DB::table('orders')->insertGetId([
                'user_id'           => $uid,
                'transaction_id'    => 'TXN-' . str_pad($i + 1000, 6, '0', STR_PAD_LEFT),
                'quantity'          => $qty,
                'discount_quantity' => 0,
                'discount_percent'  => 0,
                'total_price'       => $total,
                'payment_method'    => ['stripe', 'paypal', 'card'][rand(0, 2)],
                'invoice_no'        => 'INV-2026-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'campaign_id'       => $camId,
                'payment_status'    => 'completed',
                'created_at'        => now()->subDays(rand(1, 120)),
                'updated_at'        => now(),
            ]);

            for ($t = 0; $t < $qty; $t++) {
                DB::table('tickets')->insert([
                    'user_id'       => $uid,
                    'order_id'      => $oid,
                    'campaign_id'   => $camId,
                    'ticket_number' => $prefixes[$camId - 1] . '-' . str_pad($i * 10 + $t + 100000, 6, '0', STR_PAD_LEFT),
                    'status'        => 'active',
                    'created_at'    => now()->subDays(rand(1, 120)),
                    'updated_at'    => now(),
                ]);
            }
        }

        // ─── VISITORS (Generate 200 random visitors) ─────────────────────
        $countries = ['Austria', 'Germany', 'Hungary', 'Switzerland', 'Croatia', 'Slovenia', 'Slovakia', 'Italy', 'Czech Republic'];
        for ($v = 1; $v <= 200; $v++) {
            $hasUser = rand(0, 1);
            DB::table('visitors')->insert([
                'code'       => 'VIS-' . str_pad($v, 5, '0', STR_PAD_LEFT),
                'ip'         => rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(1, 254),
                'country'    => $countries[rand(0, count($countries) - 1)],
                'user_id'    => $hasUser ? rand(2, $userCount) : null,
                'created_at' => now()->subDays(rand(1, 90))->subHours(rand(1, 23)),
                'updated_at' => now(),
            ]);
        }
    }
}
