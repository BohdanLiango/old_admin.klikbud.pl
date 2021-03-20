<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'dashboard',
            'new-tab' => false,
        ],
        [
            'title' => 'Contact',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'settings.klikbud.contact.index',
            'new-tab' => false,
        ],

        [
            'section' => 'Work',
        ],
        [
            'title' => 'Clients',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'clients.show',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Settings',
        ],
        [
            'title' => 'klikbud.pl',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Home',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Suwak',
                            'page' => 'settings.klikbud.home.slider.index',
                        ],
                        [
                            'title' => 'Usługi',
                            'page' => 'settings.klikbud.home.service.index'
                        ],
                        [
                            'title' => 'Licznik',
                            'page' => 'settings.klikbud.home.count.index'
                        ],
                        [
                            'title' => 'Opinie',
                            'page' => 'settings.klikbud.home.opinion.index'
                        ],
                    ]
                ],
                [
                    'title' => 'Gallery',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Gallery',
                            'page' => 'settings.klikbud.gallery.index',
                        ],
                        [
                            'title' => 'Dodaj nowy obraz',
                            'page' => 'settings.klikbud.gallery.create'
                        ],
                    ]
                ],
                [
                    'title' => 'Newsletter',
                    'page' => 'settings.klikbud.newsletter'

                ]
            ]
        ],
        [
            'title' => 'Address',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'settings.address.show',
            'new-tab' => false,
        ],
//        [
//            'title' => 'Pages',
//            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
//            'bullet' => 'dot',
//            'root' => true,
//            'submenu' => [
//                [
//                    'title' => 'Wizard',
//                    'bullet' => 'dot',
//                    'submenu' => [
//                        [
//                            'title' => 'Wizard 1',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Wizard 2',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Wizard 3',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Wizard 4',
//                            'page' => '#'
//                        ]
//                    ]
//                ],
//                [
//                    'title' => 'Pricing Tables',
//                    'bullet' => 'dot',
//                    'submenu' => [
//                        [
//                            'title' => 'Pricing Tables 1',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Pricing Tables 2',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Pricing Tables 3',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Pricing Tables 4',
//                            'page' => '#'
//                        ]
//                    ]
//                ],
//                [
//                    'title' => 'Invoices',
//                    'bullet' => 'dot',
//                    'submenu' => [
//                        [
//                            'title' => 'Invoice 1',
//                            'page' => '#'
//                        ],
//                        [
//                            'title' => 'Invoice 2',
//                            'page' => '#'
//                        ]
//                    ]
//                ],
//                [
//                    'title' => 'User Pages',
//                    'bullet' => 'dot',
//                    'label' => [
//                        'type' => 'label-rounded label-primary',
//                        'value' => '2'
//                    ],
//                    'submenu' => [
//                        [
//                            'title' => 'Login 1',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Login 2',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Login 3',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Login 4',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Login 5',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Login 6',
//                            'page' => '#',
//                            'new-tab' => true
//                        ]
//                    ]
//                ],
//                [
//                    'title' => 'Error Pages',
//                    'bullet' => 'dot',
//                    'submenu' => [
//                        [
//                            'title' => 'Error 1',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Error 2',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Error 3',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Error 4',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Error 5',
//                            'page' => '#',
//                            'new-tab' => true
//                        ],
//                        [
//                            'title' => 'Error 6',
//                            'page' => '#',
//                            'new-tab' => true
//                        ]
//                    ]
//                ]
//            ]
//        ],


    ]

];
