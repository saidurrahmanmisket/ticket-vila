<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RaffleRulesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $raffleImages = public_path('uploads/raffle-rules');
        $existsRaffleImages = public_path('seed-files/raffle-rules');

        if (File::exists($raffleImages)) {
            File::deleteDirectory($raffleImages);
        }
        File::makeDirectory($raffleImages);
        File::copyDirectory($existsRaffleImages, $raffleImages);
        \DB::table('raffle_rules')->delete();

        \DB::table('raffle_rules')->insert([
            0 => [
                'id' => 2,
                'title_en' => '§2 Ticket Purchase',
                'title_de' => '§2 Ticketkauf',
                'title_hu' => '§2 Jegyvásárlás',
                'description_en' => 'Each raffle ticket costs €99 Tickets can be purchased through our official website. Participants may buy multiple tickets for increased chances of winning.',
                'description_de' => 'Jedes Verlosungsticket kostet 99 €. Tickets können über unsere offizielle Website gekauft werden. Teilnehmer können mehrere Tickets kaufen, um ihre Gewinnchancen zu erhöhen.',
                'description_hu' => 'Minden sorsjegy ára 99 €. A jegyek megvásárolhatók a hivatalos weboldalunkon. A résztvevők több jegyet is vásárolhatnak, hogy növeljék nyerési esélyeiket.',
                'image' => 'uploads/raffle-rules/1719052097-56a593ff-0828-42bb-8e83-c58bcbd13bb4.png',
                'sort_id' => '1',
                'button_type' => 'buy_now',
                'status' => 'active',
                'created_at' => '2024-06-22 06:56:36',
                'updated_at' => '2024-06-22 10:32:57',
            ],
            1 => [
                'id' => 3,
                'title_en' => '§1 Eligibility',
                'title_de' => '§1 Teilnahmeberechtigung',
                'title_hu' => '§1 Jogosultság',
                'description_en' => 'I Participants must be 18 years or older. Proof of age and residency may be required.',
                'description_de' => 'Teilnehmer müssen 18 Jahre oder älter sein. Ein Alters- und Wohnsitznachweis kann erforderlich sein.',
                'description_hu' => 'A résztvevőknek 18 évesnek vagy idősebbnek kell lenniük. Kor és lakóhely igazolása szükséges lehet.',
                'image' => 'uploads/raffle-rules/1719051982-96b90b53-6dab-4c30-8b30-c7b7717c15d3.png',
                'sort_id' => '0',
                'button_type' => 'none',
                'status' => 'active',
                'created_at' => '2024-06-22 06:57:04',
                'updated_at' => '2024-06-22 10:31:38',
            ],
            2 => [
                'id' => 4,
                'title_en' => '§3 Raffle Period',
                'title_de' => '§3 Verlosungszeitraum',
                'title_hu' => '§3 Sorsolási időszak',
                'description_en' => 'The raffle opens on [Start Date] and closes on [End Date]. Besides that, the raffle will take place until at least 15,000 tickets are sold.',
                'description_de' => 'Die Verlosung öffnet am [Startdatum] und schließt am [Enddatum]. Außerdem wird die Verlosung stattfinden, bis mindestens 15.000 Tickets verkauft sind.',
                'description_hu' => 'A sorsolás [Kezdési dátum] napján nyílik és [Befejezési dátum] napján zárul. Ezen kívül a sorsolás addig tart, amíg legalább 15,000 jegy elkelt.',
                'image' => 'uploads/raffle-rules/1719052136-2182003a-dc37-4853-898c-0e312b1d6624.png',
                'sort_id' => '2',
                'button_type' => 'none',
                'status' => 'active',
                'created_at' => '2024-06-22 10:28:56',
                'updated_at' => '2024-06-22 10:34:05',
            ],
            3 => [
                'id' => 5,
                'title_en' => '§4 Winner Selection',
                'title_de' => '§4 Auswahl des Gewinners',
                'title_hu' => '§4 Nyertes kiválasztása',
                'description_en' => 'The winner will be selected randomly in a public draw. The drawing process will be supervised by an independent auditor to ensure fairness.',
                'description_de' => 'Der Gewinner wird in einer öffentlichen Ziehung zufällig ausgewählt. Der Ziehungsprozess wird von einem unabhängigen Prüfer überwacht, um Fairness zu gewährleisten',
                'description_hu' => 'A nyertes véletlenszerűen kerül kiválasztásra egy nyilvános sorsoláson. A sorsolási folyamatot független könyvvizsgáló felügyeli, hogy biztosítsa az igazságosságot.',
                'image' => 'uploads/raffle-rules/1719052171-f021b661-2ba1-4dba-a76d-3cc345e51506.png',
                'sort_id' => '3',
                'button_type' => 'none',
                'status' => 'active',
                'created_at' => '2024-06-22 10:29:31',
                'updated_at' => '2024-06-22 10:35:24',
            ],
        ]);

    }
}
