<?php
return [

    'default_data' => [
        'categories' => [
            'shop' => 'Sklep budowlany',
            'wholesale' => 'Hurtownia',
            'refueling' => 'Stacja benzynowa',
            'show_tool' => 'Sklep z narzedziami',
            'other' => 'Inne'
        ],
        'form' => [
            '1' => [
                'title' => '',
                'title_long' => 'jednoosobowa działalność gospodarcza'
            ],
            '2' => [
                'title' => 'S. C.',
                'title_long' => 'spółka cywilna'
            ],
            '3' => [
                'title' => 'SP. Z O.O.',
                'title_long' => 'spółka z ograniczoną odpowiedzialnością'
            ],
            '4' => [
                'title' => 'S. A.',
                'title_long' => 'spółka akcyjna'
            ],
            '5' => [
                'title' => 'SP. J.',
                'title_long' => 'spółka jawna'
            ],
            '6' => [
                'title' => 'SP. P.',
                'title_long' => 'spółka partnerska'
            ],
            '7' => [
                'title' => 'SP. K.',
                'title_long' => 'spółka komandytowa'
            ],
            '8' => [
                'title' => 'S. K. A.',
                'title_long' => 'spółka komandytowo-akcyjna'
            ],
            '99' => [
                'title' => 'Inne',
                'title_long' => 'Inne'
            ],
        ],
        'type' => [
            'business' => 'Firma',
            'department' => 'Oddział'
        ],
    ],

    'index' => [
        'title' => 'Firmy & Oddziały',
        'buttons' => [
            'back' => 'Powrót',
            'department' => 'Oddział',
            'business' => 'Firmę'
        ],
        'search' => 'Wyszukaj (Nazwa, NIP)',
        'category' => 'Kategoria',
        'table' => [
            'title' => 'Nazwa',
            'nip' => 'NIP',
            'type' => 'Rodzaj',
            'category' => 'Kategoria'
        ],
    ],

    'add_edit_form' => [
        'breadcrumbs_title' => [
            'business' => 'firmy',
            'departments' => 'oddziału',
            'form_add' => 'Formularz dodania',
            'form_edit' => 'Formularz edycji'
        ],
        'buttons' => [
            'back' => 'Powrót',
            'save' => 'Zapisać',
            'edit' => 'Zapisz zmiany'
        ],
        'error' => 'Błąd',
        'information' => 'Informacja Ogólna',
        'title' => 'Nazwa',
        'title_short' => 'Krótka nazwa',
        'type' => 'Rodzaj',
        'select' => 'Wybierz',
        'other' => 'Wpisz wartośc',
        'is_manufacturer' => 'To roducent narzędzi?',
        'description' => 'Opis',
        'business' => 'Firma',
        'category' => 'Kategoria',
        'logo' => 'Logo:',
        'image' => 'Obraz',
        'choose_image' => 'Wybierz plik',
        'short_info_image' => 'Obraz o maksymalnym rozmiarze 256kb',
        'address' => 'Adress',
        'address_select' => 'Adresa',
        'number' => 'Numer budynku',
        'apartments_number' => 'Numer mieszkania',
        'zip_code' => 'Kod pocztowy',
        'title_nip_regon_bdo' => 'NIP, REGON,BDO',
        'nip' => 'NIP',
        'regon' => 'REGON',
        'bdo' => 'BDO',
        'contacts' => 'Dane Kontaktowe',
        'email' => 'E-mail',
        'phone' => 'Numer kontaktowy',
        'site' => 'Strona internetowa',
        'messages' => [
            'store_1' => 'zapisano',
            'edit_1' => 'Zmiany dla',
            'edit_2' => 'zapisani'
        ]
    ],

    'show' => [
        'business' => 'Firma',
        'buttons' => [
            'back' => 'Wstecz',
            'department' => 'Dodaj oddział',
        ],
        'manufacturer' => 'Producent Narzędzi',
        'nip' => 'NIP',
        'regon' => 'REGON',
        'bdo' => 'BDO',
        'address' => [
            'state' => 'woj.',
            'town' => 'm.',
            'street' => 'ul.'
        ],
        'departments_table' => [
            'title' => 'Nazwa',
            'description' => 'Opis',
            'category' => 'Kategoria',
            'address' => 'Adresa',
            'contacts' => 'Dane kontaktowe'
        ],

        'delete' => [
            'delete_department' => 'Czy chcesz usunąć oddział',
            'yes' => 'Tak',
            'no' => 'Nie',
            'delete_business' => 'Czy chcesz usunąć firmę',
            'message_department' => 'Pomyślnie usunięto',
            'message_business' => 'usunięto'
        ],
    ],
];
