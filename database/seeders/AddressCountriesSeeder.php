<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            "Abchazja", "Afganistan", "Albania", "Algieria", "Andora", "Angola", "Antigua i Barbuda", "Arabia Saudyjska", "Argentyna", "Armenia",
            "Australia", "Austria", "Azerbejdżan", "Bahamy", "Bahrajn", "Bangladesz", "Barbados", "Belgia", "Belize", "Benin", "Bhutan", "Białoruś", "Birma",
           "Boliwia", "Bośnia i Hercegowina", "Botswana", "Brazylia", "Brunei", "Bułgaria", "Burkina Faso", "Burundi", "Chile", "Chiny", "Chorwacja", "Cypr",
            "Cypr Północny", "Czad", "Czarnogóra", "Czechy", "Dania", "Demokratyczna Republika Konga", "Dominika", "Dominikana", "Dżibuti", "Egipt", "Ekwador",
           "Erytrea", "Estonia", "Etiopia", "Fidżi", "Filipiny", "Finlandia", "Francja", "Gabon", "Gambia", "Ghana", "Górski Karabach", "Grecja", "Grenada",
            "Gruzja", "Gujana", "Gwatemala", "Gwinea", "Gwinea Bissau", "Gwinea Równikowa", "Haiti", "Hiszpania", "Holandia", "Honduras", "Indie", "Indonezja",
           "Irak", "Iran", "Irlandia", "Islandia", "Izrael", "Jamajka", "Japonia", "Jemen", "Jordania", "Kambodża", "Kamerun", "Kanada", "Katar", "Kazachstan", "Kenia", "Kirgistan", "Kiribati",
            "Kolumbia", "Komory", "Kongo", "Korea Południowa", "Korea Północna", "Kosowo", "Kostaryka", "Kuba", "Kuwejt", "Laos", "Lesotho", "Liban", "Liberia", "Libia", "Liechtenstein",
           "Litwa", "Luksemburg", "Łotwa", "Macedonia", "Madagaskar", "Malawi", "Malediwy", "Malezja", "Mali", "Malta", "Maroko", "Mauretania", "Mauritius", "Meksyk", "Mikronezja",
            "Mołdawia", "Monako", "Mongolia", "Mozambik", "Naddniestrze", "Namibia", "Nauru", "Nepal", "Niemcy", "Niger", "Nigeria", "Nikaragua", "Norwegia", "Nowa Zelandia", "Oman", "Osetia Południowa", "Pakistan", "Panama", "Papua - Nowa Gwinea", "Paragwaj", "Peru", "Polska", "Portugalia", "Republika Południowej Afryki", "Republika Środkowoafrykańska", "Republika Zielonego Przylądka", "Rosja", "Rumunia", "Rwanda",
            "Saint Kitts i Nevis", "Saint Lucia", "Saint Vincent i Grenadyny", "Salwador", "Samoa", "San Marino", "Senegal", "Serbia", "Seszele", "Sierra Leone", "Singapur",
            "Słowacja", "Słowenia", "Somalia", "Somaliland", "Sri Lanka", "Stany Zjednoczone", "Suazi", "Sudan", "Surinam", "Syria",
            "Szwajcaria", "Szwecja", "Tadżykistan", "Tajlandia", "Tajwan", "Tanzania", "Timor Wschodni", "Togo", "Tonga", "Trynidad i Tobago", "Tunezja", "Turcja", "Turkmenistan", "Tuvalu", "Uganda",
           "Ukraina", "Urugwaj", "Uzbekistan", "Vanuatu", "Watykan", "Wenezuela", "Węgry", "Wielka Brytania", "Wietnam", "Włochy", "Wybrzeże Kości Słoniowej", "Wyspy Salomona",
            "Wyspy Świętego Tomasza i Książęca", "Zambia", "Zimbabwe", "Zjednoczone Emiraty Arabskie"
        ];

        foreach($countries as $key) {
            $table = DB::table('address')->where('title', '=', $key)->get();

            if ($table->isEmpty() === true) {
                DB::table('address')->insert([
                    'title' => $key,
                    'slug' =>  Str::slug($key, '_'),
                    'user_id' => 1,
                    'type_id' => 1,
                    'moderated_id' => 1
                ]);
            }
            continue;
        }

    }
}
