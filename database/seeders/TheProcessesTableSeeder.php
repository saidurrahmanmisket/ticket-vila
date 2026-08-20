<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TheProcessesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $the_process_images = public_path('uploads/the-process');
        $the_process_icon = public_path('uploads/the-process-icon');
        $existsProcessImage = public_path('seed-files/the-process');
        $existsProcessIcon = public_path('seed-files/the-process-icon');

        if (!File::exists(public_path('uploads'))) {
            File::makeDirectory(public_path('uploads'), 0755, true);
        }
        if (File::exists($the_process_images)) {
            File::deleteDirectory($the_process_images);
        }
        File::makeDirectory($the_process_images, 0755, true);
        if (File::exists($existsProcessImage)) {
            File::copyDirectory($existsProcessImage, $the_process_images);
        }
        if (File::exists($the_process_icon)) {
            File::deleteDirectory($the_process_icon);
        }
        File::makeDirectory($the_process_icon, 0755, true);
        if (File::exists($existsProcessIcon)) {
            File::copyDirectory($existsProcessIcon, $the_process_icon);
        }

        \DB::table('the_processes')->insert([
            0 => [
                'id' => 1,
                'title_en' => 'We Are Officially Starting To Sell The E-Book',
                'title_de' => 'Wir beginnen offiziell mit dem Verkauf des E-Books',
                'title_hu' => 'Hivatalosan megkezdjük az e-könyv értékesítését',
                'description_en' => 'The eBooks are now on sale worldwide, accepting a wide range of payment methods including methods including Euros, Dollars and many other currencies to suit everyone\'s preferences. Each e-book comes with a free numbered entry ticket for the Dream House prize draw.',
                'description_de' => 'Die E-Books sind jetzt weltweit erhältlich und akzeptieren eine Vielzahl von Zahlungsmethoden, einschließlich Euro, Dollar und vielen anderen Währungen, um den Vorlieben aller gerecht zu werden. Jedes E-Book kommt mit einem kostenlosen nummerierten Los für die Verlosung des Traumhauses.',
                'description_hu' => 'Az e-könyvek mostantól világszerte kaphatók, és számos fizetési módot elfogadnak, beleértve az eurót, a dollárt és sok más valutát, hogy mindenki igényeinek megfeleljenek. Minden e-könyv mellé egy ingyenes, sorszámozott belépőjegy jár a Dream House nyereményjátékhoz.',
                'image' => 'uploads/the-process/1718441221-9ee05516-c83c-4b67-8d31-d4608ee2e4ed.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718342472-2f73e4ba-91a4-411c-b032-095a1ad0089f.png',
                'icon_top_text_en' => 'E-BOOK SALE STARTS',
                'icon_top_text_de' => 'VERKAUF DER E-BOOKS BEGINNT',
                'icon_top_text_hu' => 'E-KÖNYV ÁRUSÍTÁS KEZDŐDIK',
                'icon_bottom_text_en' => null,
                'icon_bottom_text_de' => null,
                'icon_bottom_text_hu' => null,
                'sort_id' => '0',
                'button_type' => 'none',
                'status' => 'active',
                'created_at' => '2024-06-14 05:21:12',
                'updated_at' => '2024-06-17 03:21:15',
            ],
            1 => [
                'id' => 2,
                'title_en' => 'One Insider Dashboard For All Your Needs.',
                'title_de' => 'Ein Insider-Dashboard für all Ihre Bedürfnisse.',
                'title_hu' => 'Egy belső irányítópult minden igényének kielégítésére.',
                'description_en' => 'Explore exposés, buy tickets, join our affiliate programme to earn money, view live statistics, news updates and more. Our dedicated dashboard streamlines the entire process for seamless management.',
                'description_de' => 'Entdecken Sie Enthüllungen, kaufen Sie Tickets, treten Sie unserem Partnerprogramm bei, um Geld zu verdienen, sehen Sie sich Live-Statistiken, Nachrichten-Updates und mehr an. Unser dediziertes Dashboard vereinfacht den gesamten Prozess für ein nahtloses Management',
                'description_hu' => 'Fedezze fel a leleplezéseket, vásároljon jegyeket, csatlakozzon partnerprogramunkhoz, hogy pénzt keressen, tekintse meg az élő statisztikákat, híreket és még sok mást. Külön irányítópultunk leegyszerűsíti az egész folyamatot a zökkenőmentes kezelhetőség érdekében.',
                'image' => 'uploads/the-process/1718441232-4d35ef22-aafa-4690-8a08-652cd6d8881f.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718428961-828b9f05-a46f-4176-a737-38b49a71c39d.png',
                'icon_top_text_en' => 'ALL YOUR NEEDS',
                'icon_top_text_de' => 'ALLE IHRE BEDÜRFNISSE',
                'icon_top_text_hu' => 'MINDEN IGÉNYE',
                'icon_bottom_text_en' => null,
                'icon_bottom_text_de' => null,
                'icon_bottom_text_hu' => null,
                'sort_id' => '1',
                'button_type' => 'buy_now',
                'status' => 'active',
                'created_at' => '2024-06-15 05:22:41',
                'updated_at' => '2024-06-17 03:23:02',
            ],
            2 => [
                'id' => 3,
                'title_en' => 'We Have Reached Our Goal, The Raffle Is About To Start!',
                'title_de' => 'Wir haben unser Ziel erreicht, die Verlosung steht kurz bevor!',
                'title_hu' => 'Elértük a célunkat, a sorsolás hamarosan kezdődik!',
                'description_en' => 'We have reached our goal and the raffle can begin. But wait, there is more! If we reach our goal within the target time frame of 6 months, the lucky winner will receive substantial bonuses. Bonus milestones are at 17,000 and 20,000 tickets sold. Keep scrolling',
                'description_de' => 'Wir haben unser Ziel erreicht und die Verlosung kann beginnen. Aber warten Sie, es gibt noch mehr! Wenn wir unser Ziel innerhalb des Zielzeitraums von 6 Monaten erreichen, erhält der glückliche Gewinner erhebliche Boni. Bonusmeilensteine liegen bei 17.000 und 20.000 verkauften Tickets. Scrollen Sie weiter.',
                'description_hu' => 'Elértük a célunkat, és a sorsolás megkezdődhet. De várjon, van még több! Ha a célunkat a 6 hónapos célidőn belül érjük el, a szerencsés nyertes jelentős bónuszokat kap. A bónusz mérföldkövek 17,000 és 20,000 eladott jegynél vannak. Görgessen tovább.',
                'image' => 'uploads/the-process/1718441243-bf8abbab-9bfe-4575-8e1f-f0e6e1dbea6f.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718429067-d7788627-f268-4ebd-8e6d-e30b30bd09ed.png',
                'icon_top_text_en' => '15.000 E-BOOK SOLD',
                'icon_top_text_de' => '15.000 E-Books verkauft',
                'icon_top_text_hu' => '15.000 eladott e-könyv',
                'icon_bottom_text_en' => null,
                'icon_bottom_text_de' => null,
                'icon_bottom_text_hu' => null,
                'sort_id' => '2',
                'button_type' => 'buy_now',
                'status' => 'active',
                'created_at' => '2024-06-15 05:24:27',
                'updated_at' => '2024-06-17 03:24:57',
            ],
            3 => [
                'id' => 4,
                'title_en' => '€20,000 Extra Furniture Voucher.',
                'title_de' => '20.000 € Extra-Möbelgutschein.',
                'title_hu' => '20.000 euró értékű extra bútorutalvány.',
                'description_en' => 'At this point, the lucky winner will receive an extra €20,000 furniture voucher to go with the house! You might think there is nothing left to be desired. A luxurious house for just €99, plus a €20,000 furniture voucher or the winner can choose the €20,000 cash. What more could you ask for?',
                'description_de' => 'Zu diesem Zeitpunkt wird der glückliche Gewinner einen zusätzlichen Möbelgutschein im Wert von 20.000 € erhalten, der zum Haus passt! Man könnte denken, es bleibt nichts mehr zu wünschen übrig. Ein luxuriöses Haus für nur 99 €, plus ein Möbelgutschein im Wert von 20.000 € oder der Gewinner kann sich für 20.000 € Bargeld entscheiden. Was könnte man sich mehr wünschen?',
                'description_hu' => 'Ebben a pontban a szerencsés nyertes egy 20.000 eurós bútorutalványt kap a ház mellé! Lehet, hogy úgy gondolja, nincs több kívánnivaló. Egy luxus ház mindössze 99 euróért, plusz egy 20.000 eurós bútorutalvány, vagy a nyertes választhatja a 20.000 eurós készpénzt. Mit kívánhatna még?',
                'image' => 'uploads/the-process/1718441251-05904512-00ef-4993-a794-8f8b41ced3b9.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718429214-89ba2ad7-b723-4e4e-b560-b4e4c7e7e652.png',
                'icon_top_text_en' => '17.000 TICKETS SOLD',
                'icon_top_text_de' => '17.000 Tickets verkauft',
                'icon_top_text_hu' => '17.000 jegy elkelt',
                'icon_bottom_text_en' => 'BONUS',
                'icon_bottom_text_de' => 'BONUS',
                'icon_bottom_text_hu' => 'BÓNUSZ',
                'sort_id' => '3',
                'button_type' => 'buy_now',
                'status' => 'active',
                'created_at' => '2024-06-15 05:26:54',
                'updated_at' => '2024-06-17 03:26:47',
            ],
            4 => [
                'id' => 5,
                'title_en' => 'Proven Fair, Legally Secure',
                'title_de' => 'Beweisbar fair, rechtlich abgesichert',
                'title_hu' => 'Igazoltan fair, jogilag biztonságos',
                'description_en' => 'Experience peace of mind with our raffle: proven fair and legally secure. Enter for a chance to win your dream home!',
                'description_de' => 'Erleben Sie sorgenfreie Sicherheit mit unserer Verlosung: nachweislich fair und rechtlich abgesichert. Machen Sie mit und gewinnen Sie Ihr Traumhaus!',
                'description_hu' => 'Tapasztalja meg a nyugalmat a sorsolásunkkal: igazoltan fair és jogilag biztonságos. Vegyen részt és nyerje meg álomotthonát!',
                'image' => 'uploads/the-process/1718441259-1798cd55-c884-4d29-911f-24db5972e744.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718429566-9a90413d-99f0-4dc9-9cd1-26a7cd2aaa38.png',
                'icon_top_text_en' => 'GOOD TO KNOW',
                'icon_top_text_de' => 'GUT ZU WISSEN',
                'icon_top_text_hu' => 'FONTOS TUDNI',
                'icon_bottom_text_en' => null,
                'icon_bottom_text_de' => null,
                'icon_bottom_text_hu' => null,
                'sort_id' => '4',
                'button_type' => 'learn_more',
                'status' => 'active',
                'created_at' => '2024-06-15 05:32:46',
                'updated_at' => '2024-06-17 03:28:12',
            ],
            5 => [
                'id' => 6,
                'title_en' => 'Installation Of An Additional Solar-Heated Indoor Pool.',
                'title_de' => 'Installation eines zusätzlichen solarbeheizten Innenpools.',
                'title_hu' => 'További napenergiával fűtött beltéri medence telepítése.',
                'description_en' => 'Yes! When we reach 20,000 tickets sold, the winner will not only receive the house and the €20,000 voucher, but also a solar heated, fully indoor swimming pool for you, your family and friends to enjoy. The value of this is €60,000.00 or the winner can choose to claim the cash price instead.',
                'description_de' => 'Ja! Wenn wir 20.000 Tickets verkauft haben, wird der Gewinner nicht nur das Haus und den 20.000 €-Gutschein erhalten, sondern auch einen vollständig solarbeheizten Innenpool für Sie, Ihre Familie und Freunde zum Genießen. Der Wert davon beträgt 60.000,00 € oder der Gewinner kann sich für den Bargeldpreis entscheiden.',
                'description_hu' => 'Igen! Ha elérjük a 20.000 eladott jegyet, a nyertes nemcsak a házat és a 20.000 eurós utalványt kapja meg, hanem egy teljesen napenergiával fűtött beltéri medencét is, hogy Ön, családja és barátai élvezzék. Ennek az értéke 60.000,00 euró, vagy a nyertes választhatja a készpénznyereményt is.',
                'image' => 'uploads/the-process/1718441266-29a2a539-7d5b-4666-8dd5-7b524b6a84c2.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718429678-53bb19a6-ed45-447f-8a23-97f55d01e291.png',
                'icon_top_text_en' => '20.000 TICKETS SOLD',
                'icon_top_text_de' => '20.000 Tickets verkauft',
                'icon_top_text_hu' => '20.000 jegy elkelt',
                'icon_bottom_text_en' => 'BONUS',
                'icon_bottom_text_de' => 'BONUS',
                'icon_bottom_text_hu' => 'BÓNUSZ',
                'sort_id' => '5',
                'button_type' => 'learn_more',
                'status' => 'active',
                'created_at' => '2024-06-15 05:34:38',
                'updated_at' => '2024-06-17 03:33:10',
            ],
            6 => [
                'id' => 7,
                'title_en' => 'The Odds Are 9332 Times Better Than The Lottery',
                'title_de' => 'Die Chancen sind 9332-mal besser als beim Lotto.',
                'title_hu' => 'A lehetőségek 9332-szer jobbak, mint a lottónál.',
                'description_en' => 'Experience peace of mind with our raffle: proven fair and legally secure. Enter for a chance to win your dream home!',
                'description_de' => 'Erleben Sie mit unserer Verlosung sorgenfreie Sicherheit: nachweislich fair und rechtlich abgesichert. Nehmen Sie teil und haben Sie die Chance, Ihr Traumhaus zu gewinnen!',
                'description_hu' => 'Tapasztalja meg a nyugalmat a sorsolásunkkal: bizonyítottan fair és jogilag biztonságos. Vegyen részt, és legyen esélye álomotthonát megnyerni!',
                'image' => 'uploads/the-process/1718441276-57c0f0f5-4a67-4381-991f-8e8c68eda947.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718429782-92c555d0-7ca9-4516-9b05-61795a279cf9.png',
                'icon_top_text_en' => 'LIVE DRAWING',
                'icon_top_text_de' => 'LIVE-ZIEHUNG',
                'icon_top_text_hu' => 'ÉLŐ SORSOLÁS',
                'icon_bottom_text_en' => null,
                'icon_bottom_text_de' => null,
                'icon_bottom_text_hu' => null,
                'sort_id' => '6',
                'button_type' => 'learn_more',
                'status' => 'active',
                'created_at' => '2024-06-15 05:36:22',
                'updated_at' => '2024-06-17 03:34:34',
            ],
            7 => [
                'id' => 8,
                'title_en' => 'We Guarantee 100% Transparency! The Winner Is Drawn Live.',
                'title_de' => 'Wir garantieren 100% Transparenz! Der Gewinner wird live gezogen.',
                'title_hu' => '100%-os átláthatóságot garantálunk! A nyertes élőben kerül kisorsolásra.',
                'description_en' => 'Pledge complete transparency with us! Our commitment to fairness means that the winner will be drawn live on YouTube by a Cypriot Notary Public so that the excitement can be viewed by all. Don\'t miss your chance to win big!',
                'description_de' => 'Versprechen Sie uns vollständige Transparenz! Unser Engagement für Fairness bedeutet, dass der Gewinner live auf YouTube von einem zypriotischen Notar gezogen wird, damit alle die Spannung miterleben können. Verpassen Sie nicht Ihre Chance auf den großen Gewinn!',
                'description_hu' => 'Ígérjük teljes átláthatóságot! Az igazságosságra való elkötelezettségünk azt jelenti, hogy a nyertest élőben YouTube-on egy ciprusi közjegyző sorsolja ki, így mindenki részt vehet az izgalomban. Ne hagyja ki a nagy nyerési lehetőséget!',
                'image' => 'uploads/the-process/1718441284-4b28dd5e-4a84-4775-b7c5-18bddb86c86e.jpg',
                'video_url_en' => null,
                'video_url_de' => null,
                'video_url_hu' => null,
                'icon' => 'uploads/the-process-icon/1718429885-34016d40-a8fa-4f38-b714-f37747abcbf9.png',
                'icon_top_text_en' => null,
                'icon_top_text_de' => null,
                'icon_top_text_hu' => null,
                'icon_bottom_text_en' => null,
                'icon_bottom_text_de' => null,
                'icon_bottom_text_hu' => null,
                'sort_id' => '7',
                'button_type' => 'both',
                'status' => 'active',
                'created_at' => '2024-06-15 05:38:05',
                'updated_at' => '2024-06-17 03:35:37',
            ],
        ]);

    }
}
