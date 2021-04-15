<?php
return [
    'default_data' => [
        'active' => 'Roboczy',
        'dont_work' => 'Nie pracuje',
        'in_repair' => 'W naprawie',
        'sell' => 'Sprzedany',
        'destroy' => 'Zniszczony',
        'stolen' => 'Wykradziony',
        'lost' => 'Zgubiony'
    ],

    'index' => [
        'subheader' => [
            'title' => 'Narzęzia',
            'buttons' => [
                'label' => 'Wybierz opcie',
                'tool' => 'Narzędzie'
            ],
        ],
        'widget' => [
            '1' => [
                'title' => 'Wszystkie narzędzia',
                'percent' => 'Procent',
            ],
            '2' => [
                'title' => 'Narzędzia aktywne'
            ],
            '3' => [
                'title' => 'Narzędzia usunięte'
            ]
        ],
        'search' => 'Wyszukaj',
        'status' => 'Status',
        'aside_widget' => [
            'categories' => 'Kategorie',
            'warehouse'  => 'Magazyn',
            'objects'  => 'Obiekty',
            'clients' => 'Klienty',
            'business' => 'Firmy'
        ],
        'buttons' => [
            'view_all' => 'Cofnij filtry'
        ],
    ],

    'add_edit' => [
        'add_title' => 'Forma dodania narzedzia & Skrzyni',
        'edit_title' => 'Edytowanie',
        'buttons' => [
            'save_form' => 'Zapisz formularz',
            'save' => 'Zapisz',
            'save_continue' => 'kontynuj',
            'save_add' => 'dodaj nowego',
            'save_exit' => 'wyjdź ',
            'back' => 'Wstecz',
            'edit_button' => 'Zapisz zmiany'
        ],
        'form' => [
            'h2_1' => 'Informacja ogólna',
            'title' => 'Nazwa',
            'title_placeholder' => 'Nazrzedzie',
            'is_box' => 'To skrzynia?',
            'main_category' => 'Kategoria głowna',
            'half_category' => 'Podkategoria',
            'category' => 'Kategoria',
            'description' => 'Opis',
            'image' => 'Zdjęcie',
            'image_info' => 'Obraz o maksymalnym rozmiarze 256kb',
            'h2_2' => 'Dane zakupu',
            'date_purchase' => 'Data zakupu',
            'price' => 'Cena',
            'price_value' => 'ZŁ',
            'serial_number' => 'Numer seryjny',
            'where_buy' => 'Gdzie kupiony?',
            'manufakturer' => 'Producent',
            'h2_3' => 'Gwarancja',
            'date_end_guarantee' => 'Data zakończenia rękojmi',
            'file_guarantee' => 'Gwarancyjny plik',
            'file_guarantee_info' => 'Maksymalny rozmiar 2Mb, .pdf'
        ],
        'message' => [
            'add_form_1' => 'Narzedzie',
            'add_form_2' => 'zapisano!',
            'edit_form_1' => 'Narzedzie',
            'edit_form_2' => 'edytowano!'
        ],
    ],

    'one' => [
        'messages' => [
            'warehouse_change' => 'Pomyślnie zmienione miejsce na magazyn',
            'client_change' => 'Pomyślnie zmienione miejsce u klienta',
            'object_change' => 'Pomyślnie zmienione miejsce na obiekcie',
            'business_change' => 'Pomyślnie zmienione miejsce do firmy',
            'status_change' => 'Status zmieniony',
            'box_change' => 'Skrzynia zmieniona',
            'box_change_delete' => 'Pomyślnie zmieniono',
            'delete_1' => 'Narzedzie',
            'delete_2' => 'usunięto!'
        ],
        'price' => 'Cena',
        'value' => 'zł',
        'status' => 'Status',
        'box' => 'Skrzynia',
        'purchase_date' => 'Data zakupu',
        'serial_number' => 'Numer seryjny',
        'business_department' => 'Miejsce zakupu',
        'manufacturer' => 'Producent',
        'guarantee_date_end' => 'Data zakończenia rękojmu',
        'user_add' => 'Dodał',
        'in_object' => 'Na obiekcie',
        'in_warehouse' => 'Na magazynie',
        'in_client' => 'U klienta',
        'in_business' => 'Na firmie',
        'download_file' => 'Pobierz plik gwarancyjny',
        'download_image' => 'Pobierz obraz',
        'none' => '-',
        'modals' => [
            'box_title' => 'Zmiana skrzyni',
            'boxes' => 'Skrzyni',
            'object_change' => 'Zmiana obiektu',
            'objects' => 'Obiekty',
            'warehouse_change' => 'Zmiana magazynu',
            'warehouses' => 'Magazyny',
            'client_change' => 'Zmiana klienta',
            'clients' => 'Klenty',
            'business_change' => 'Zmiana firmy',
            'business' => 'Firmy',
            'save' => 'Zapisz zmiany',
            'close' => 'Zamknij'
        ],
    ],
];
