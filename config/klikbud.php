<?php
return [
    'disk_store' => 's3',
    'main_folder_store' => 'public/',
    'url_to_clear_cache' => 'http://klikbud.pl/asdasd321413asdasd21312sadsad12321sadsad123123',
    'klikbud' => [
        'status_to_main_page' => [
            'visible' => 1,
            'not_visible' => 2
        ],
        'status_to_gallery' => [
            'visible' => 1,
            'not_visible' => 2
        ],
        'status_contact' => [
            'read' => 1,
            'new' => 2
        ]
    ],

    'moderated' => [
        'moderated' => 1,
        'to_moderation' => 2
    ],
];
