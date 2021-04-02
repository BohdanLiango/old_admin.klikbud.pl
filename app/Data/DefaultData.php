<?php

namespace App\Data;

class DefaultData extends Data
{
    /**
     * @return array[]
     */
    public function address(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/settings/address.country'), "class" => 'label label-success label-pill label-inline mr-2'],
            ["value" => 2, "title" => trans('admin_klikbud/settings/address.add-button-state'), "class" => 'label label-warning label-pill label-inline mr-2'],
            ["value" => 3, "title" => trans('admin_klikbud/settings/address.add-button-town'), "class" => 'label label-info label-pill label-inline mr-2'],
            ["value" => 4, "title" => trans('admin_klikbud/settings/address.add-button-street'), "class" => 'label label-danger label-pill label-inline mr-2'],
        ];
    }

    /**
     * @return array[]
     */
    public function klikbud_gallery_categories(): array
    {
        return [
            ['value' => NULL, 'title' => trans('klikbud/gallery.categories.0'), 'slug' => trans('klikbud/gallery.categories_slug.0')],
            ['value' => 1, 'title' => trans('klikbud/gallery.categories.1'), 'slug' => trans('klikbud/gallery.categories_slug.1')],
            ['value' => 2, 'title' => trans('klikbud/gallery.categories.2'), 'slug' => trans('klikbud/gallery.categories_slug.2')],
            ['value' => 3, 'title' => trans('klikbud/gallery.categories.3'), 'slug' => trans('klikbud/gallery.categories_slug.3')],
            ['value' => 4, 'title' => trans('klikbud/gallery.categories.4'), 'slug' => trans('klikbud/gallery.categories_slug.4')],
            ['value' => 5, 'title' => trans('klikbud/gallery.categories.5'), 'slug' => trans('klikbud/gallery.categories_slug.5')],
            ['value' => 6, 'title' => trans('klikbud/gallery.categories.6'), 'slug' => trans('klikbud/gallery.categories_slug.6')],
        ];
    }

    /**
     * @return array[]
     */
    public function klikbud_status_to_main_page(): array
    {
        return [
            ['value' => NULL, 'title' => trans('admin_klikbud/settings/klikbud/all.status_to_main_page.all'), 'class' => 'primary'],
            ['value' => config('klikbud.klikbud.status_to_main_page.visible'), 'title' => trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active'), 'class' => 'success'],
            ['value' => config('klikbud.klikbud.status_to_main_page.not_visible'), 'title' => trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden'), 'class' => 'warning'],
        ];
    }

    /**
     * @return array[]
     */
    public function language(): array
    {
        return [
            ['value' => 'id', 'title' => 'Bahasa Indonesia - Indonesian'],
            ['value' => 'msa', 'title' => 'Bahasa Melayu - Malay'],
            ['value' => 'ca', 'title' => 'Català - Catalan'],
            ['value' => 'cs', 'title' => 'Čeština - Czech'],
            ['value' => 'da', 'title' => 'Dansk - Danish'],
            ['value' => 'de', 'title' => 'Deutsch - German'],
            ['value' => 'en', 'title' => 'English'],
            ['value' => 'en-gb', 'title' => 'English UK - British English'],
            ['value' => 'es', 'title' => 'Español - Spanish'],
            ['value' => 'eu', 'title' => 'Euskara - Basque (beta)'],
            ['value' => 'fil', 'title' => 'Filipino'],
            ['value' => 'fr', 'title' => 'Français - French'],
            ['value' => 'ga', 'title' => 'Gaeilge - Irish (beta)'],
            ['value' => 'gl', 'title' => 'Galego - Galician (beta)'],
            ['value' => 'hr', 'title' => 'Hrvatski - Croatian'],
            ['value' => 'it', 'title' => 'Italiano - Italian'],
            ['value' => 'hu', 'title' => 'Magyar - Hungarian'],
            ['value' => 'nl', 'title' => 'Nederlands - Dutch'],
            ['value' => 'no', 'title' => 'Norsk - Norwegian'],
            ['value' => 'pl', 'title' => 'Polski - Polish'],
            ['value' => 'pt', 'title' => 'Português - Portuguese'],
            ['value' => 'ro', 'title' => 'Română - Romanian'],
            ['value' => 'sk', 'title' => 'Slovenčina - Slovak'],
            ['value' => 'fi', 'title' => 'Suomi - Finnish'],
            ['value' => 'sv', 'title' => 'Svenska - Swedish'],
            ['value' => 'vi', 'title' => 'Tiếng Việt - Vietnamese'],
            ['value' => 'tr', 'title' => 'Türkçe - Turkish'],
            ['value' => 'el', 'title' => 'Ελληνικά - Greek'],
            ['value' => 'bg', 'title' => 'Български език - Bulgarian'],
            ['value' => 'ru', 'title' => 'Русский - Russian'],
            ['value' => 'sr', 'title' => 'Српски - Serbian'],
            ['value' => 'uk', 'title' => 'Українська мова - Ukrainian'],
            ['value' => 'he', 'title' => 'Hebrew - עִבְרִית'],
            ['value' => 'ur', 'title' => 'Urdu (beta) - اردو'],
            ['value' => 'ar', 'title' => 'Arabic - العربية'],
            ['value' => 'mr', 'title' => 'मराठी - Marathi'],
            ['value' => 'hi', 'title' => 'हिन्दी - Hindi'],
            ['value' => 'bn', 'title' => 'বাংলা - Bangla'],
            ['value' => 'gu', 'title' => 'ગુજરાતી - Gujarati'],
            ['value' => 'ta', 'title' => 'தமிழ் - Tamil'],
            ['value' => 'kn', 'title' => 'ಕನ್ನಡ - Kannada'],
            ['value' => 'th', 'title' => 'ภาษาไทย - Thai'],
            ['value' => 'ko', 'title' => '한국어 - Korean'],
            ['value' => 'ja', 'title' => '日本語 - Japanese'],
            ['value' => 'zh-cn', 'title' => '简体中文 - Simplified Chinese'],
            ['value' => 'zh-tw', 'title' => '繁體中文 - Traditional Chinese'],
        ];
    }

    /**
     * @return array[]
     */
    public function time_zone(): array
    {
        return [
            ['data-offset' => "-39600", 'value' => "International Date Line West", 'title' => "(GMT-11:00) International Date Line West"],
            ['data-offset' => "-39600", 'value' => "Midway Island", 'title' => "(GMT-11:00) Midway Island"],
            ['data-offset' => "-39600", 'value' => "Samoa", 'title' => "(GMT-11:00) Samoa"],
            ['data-offset' => "-36000", 'value' => "Hawaii", 'title' => "(GMT-10:00) Hawaii"],
            ['data-offset' => "-28800", 'value' => "Alaska", 'title' => "(GMT-08:00) Alaska"],
            ['data-offset' => "-25200", 'value' => "Pacific Time (US &amp; Canada)", 'title' => "(GMT-07:00) Pacific Time (US &amp; Canada)"],
            ['data-offset' => "-25200", 'value' => "Tijuana", 'title' => "(GMT-07:00) Tijuana"],
            ['data-offset' => "-25200", 'value' => "Arizona", 'title' => "(GMT-07:00) Arizona"],
            ['data-offset' => "-21600", 'value' => "Mountain Time (US &amp; Canada)", 'title' => "(GMT-06:00) Mountain Time (US &amp; Canada)"],
            ['data-offset' => "-21600", 'value' => "Chihuahua", 'title' => "(GMT-06:00) Chihuahua"],
            ['data-offset' => "-21600", 'value' => "Mazatlan", 'title' => "(GMT-06:00) Mazatlan"],
            ['data-offset' => "-21600", 'value' => "Saskatchewan", 'title' => "(GMT-06:00) Saskatchewan"],
            ['data-offset' => "-21600", 'value' => "Central America", 'title' => "(GMT-06:00) Central America"],
            ['data-offset' => "-18000", 'value' => "Central Time (US &amp; Canada)", 'title' => "(GMT-05:00) Central Time (US &amp; Canada)<"],
            ['data-offset' => "-18000", 'value' => "Guadalajara", 'title' => "(GMT-05:00) Guadalajara"],
            ['data-offset' => "-18000", 'value' => "Mexico City", 'title' => "(GMT-05:00) Mexico City"],
            ['data-offset' => "-18000", 'value' => "Monterrey", 'title' => "(GMT-05:00) Monterrey"],
            ['data-offset' => "-18000", 'value' => "Bogota", 'title' => "(GMT-05:00) Bogota"],
            ['data-offset' => "-18000", 'value' => "Lima", 'title' => "(GMT-05:00) Lima"],
            ['data-offset' => "-18000", 'value' => "Quito", 'title' => "(GMT-05:00) Quito"],
            ['data-offset' => "-14400", 'value' => "Eastern Time (US &amp; Canada)", 'title' => "(GMT-04:00) Eastern Time (US &amp; Canada)"],
            ['data-offset' => "-14400", 'value' => "Indiana (East)", 'title' => "(GMT-04:00) Indiana (East)"],
            ['data-offset' => "-14400", 'value' => "Caracas", 'title' => "(GMT-04:00) Caracas"],
            ['data-offset' => "-14400", 'value' => "La Paz", 'title' => "(GMT-04:00) La Paz"],
            ['data-offset' => "-14400", 'value' => "Georgetown", 'title' => "(GMT-04:00) Georgetown"],
            ['data-offset' => "-10800", 'value' => "Atlantic Time (Canada)", 'title' => "(GMT-03:00) Atlantic Time (Canada)"],
            ['data-offset' => "-10800", 'value' => "Santiago", 'title' => "(GMT-03:00) Santiago"],
            ['data-offset' => "-10800", 'value' => "Brasilia", 'title' => "(GMT-03:00) Brasilia"],
            ['data-offset' => "-10800", 'value' => "Buenos Aires", 'title' => "(GMT-03:00) Buenos Aires"],
            ['data-offset' => "-9000", 'value' => "Newfoundland", 'title' => "(GMT-02:30) Newfoundland"],
            ['data-offset' => "-7200", 'value' => "Greenland", 'title' => "(GMT-02:00) Greenland"],
            ['data-offset' => "-7200", 'value' => "Mid-Atlantic", 'title' => "(GMT-02:00) Mid-Atlantic"],
            ['data-offset' => "-3600", 'value' => "Cape Verde Is.", 'title' => "(GMT-01:00) Cape Verde Is."],
            ['data-offset' => "0", 'value' => "Azores", 'title' => "(GMT) Azores"],
            ['data-offset' => "0", 'value' => "Monrovia", 'title' => "(GMT) Monrovia"],
            ['data-offset' => "0", 'value' => "UTC", 'title' => "(GMT) UTC"],
            ['data-offset' => "3600", 'value' => "Dublin", 'title' => "(GMT+01:00) Dublin"],
            ['data-offset' => "3600", 'value' => "Edinburgh", 'title' => "(GMT+01:00) Edinburgh"],
            ['data-offset' => "3600", 'value' => "Lisbon", 'title' => "(GMT+01:00) Lisbon"],
            ['data-offset' => "3600", 'value' => "London", 'title' => "(GMT+01:00) London"],
            ['data-offset' => "3600", 'value' => "Casablanca", 'title' => "(GMT+01:00) Casablanca"],
            ['data-offset' => "3600", 'value' => "West Central Africa", 'title' => "(GMT+01:00) West Central Africa"],
            ['data-offset' => "7200", 'value' => "Belgrade", 'title' => "(GMT+02:00) Belgrade"],
            ['data-offset' => "7200", 'value' => "Bratislava", 'title' => "(GMT+02:00) Bratislava"],
            ['data-offset' => "7200", 'value' => "Budapest", 'title' => "(GMT+02:00) Budapest"],
            ['data-offset' => "7200", 'value' => "Ljubljana", 'title' => "(GMT+02:00) Ljubljana"],
            ['data-offset' => "7200", 'value' => "Prague", 'title' => "(GMT+02:00) Prague"],
            ['data-offset' => "7200", 'value' => "Sarajevo", 'title' => "(GMT+02:00) Sarajevo"],
            ['data-offset' => "7200", 'value' => "Skopje", 'title' => "(GMT+02:00) Skopje"],
            ['data-offset' => "7200", 'value' => "Warsaw", 'title' => "(GMT+02:00) Warsaw"],
            ['data-offset' => "7200", 'value' => "Zagreb", 'title' => "(GMT+02:00) Zagreb"],
            ['data-offset' => "7200", 'value' => "Brussels", 'title' => "(GMT+02:00) Brussels"],
            ['data-offset' => "7200", 'value' => "Copenhagen", 'title' => "(GMT+02:00) Copenhagen"],
            ['data-offset' => "7200", 'value' => "Madrid", 'title' => "(GMT+02:00) Madrid"],
            ['data-offset' => "7200", 'value' => "Paris", 'title' => "(GMT+02:00) Paris"],
            ['data-offset' => "7200", 'value' => "Amsterdam", 'title' => "(GMT+02:00) Amsterdam"],
            ['data-offset' => "7200", 'value' => "Berlin", 'title' => "(GMT+02:00) Berlin"],
            ['data-offset' => "7200", 'value' => "Bern", 'title' => "(GMT+02:00) Bern"],
            ['data-offset' => "7200", 'value' => "Rome", 'title' => "(GMT+02:00) Rome"],
            ['data-offset' => "7200", 'value' => "Stockholm", 'title' => "(GMT+02:00) Stockholm"],
            ['data-offset' => "7200", 'value' => "Vienna", 'title' => "(GMT+02:00) Vienna"],
            ['data-offset' => "7200", 'value' => "Cairo", 'title' => "(GMT+02:00) Cairo"],
            ['data-offset' => "7200", 'value' => "Harare", 'title' => "(GMT+02:00) Harare"],
            ['data-offset' => "7200", 'value' => "Pretoria", 'title' => "(GMT+02:00) Pretoria"],
            ['data-offset' => "10800", 'value' => "Bucharest", 'title' => "(GMT+03:00) Bucharest"],
            ['data-offset' => "10800", 'value' => "Helsinki", 'title' => "(GMT+03:00) Helsinki"],
            ['data-offset' => "10800", 'value' => "Kiev", 'title' => "(GMT+03:00) Kiev"],
            ['data-offset' => "10800", 'value' => "Kyiv", 'title' => "(GMT+03:00) Kyiv"],
            ['data-offset' => "10800", 'value' => "Riga", 'title' => "(GMT+03:00) Riga"],
            ['data-offset' => "10800", 'value' => "Sofia", 'title' => "(GMT+03:00) Sofia"],
            ['data-offset' => "10800", 'value' => "Tallinn", 'title' => "(GMT+03:00) Tallinn"],
            ['data-offset' => "10800", 'value' => "Vilnius", 'title' => "(GMT+03:00) Vilnius"],
            ['data-offset' => "10800", 'value' => "Athens", 'title' => "(GMT+03:00) Athens"],
            ['data-offset' => "10800", 'value' => "Istanbul", 'title' => "(GMT+03:00) Istanbul"],
            ['data-offset' => "10800", 'value' => "Minsk", 'title' => "(GMT+03:00) Minsk"],
            ['data-offset' => "10800", 'value' => "Jerusalem", 'title' => "(GMT+03:00) Jerusalem"],
            ['data-offset' => "10800", 'value' => "Moscow", 'title' => "(GMT+03:00) Moscow"],
            ['data-offset' => "10800", 'value' => "St. Petersburg", 'title' => "(GMT+03:00) St. Petersburg"],
            ['data-offset' => "10800", 'value' => "Kuwait", 'title' => "(GMT+03:00) Kuwait"],
            ['data-offset' => "10800", 'value' => "Riyadh", 'title' => "(GMT+03:00) Riyadh"],
            ['data-offset' => "10800", 'value' => "Nairobi", 'title' => "(GMT+03:00) Nairobi"],
            ['data-offset' => "10800", 'value' => "Baghdad", 'title' => "(GMT+03:00) Baghdad"],
            ['data-offset' => "14400", 'value' => "Abu Dhabi", 'title' => "(GMT+04:00) Abu Dhabi"],
            ['data-offset' => "14400", 'value' => "Muscat", 'title' => "(GMT+04:00) Muscat"],
            ['data-offset' => "14400", 'value' => "Baku", 'title' => "(GMT+04:00) Baku"],
            ['data-offset' => "14400", 'value' => "Tbilisi", 'title' => "(GMT+04:00) Tbilisi"],
            ['data-offset' => "14400", 'value' => "Yerevan", 'title' => "(GMT+04:00) Yerevan"],
            ['data-offset' => "16200", 'value' => "Tehran", 'title' => "(GMT+04:30) Tehran"],
            ['data-offset' => "16200", 'value' => "Kabul", 'title' => "(GMT+04:30) Kabul"],
            ['data-offset' => "18000", 'value' => "Ekaterinburg", 'title' => "(GMT+05:00) Ekaterinburg"],
            ['data-offset' => "18000", 'value' => "Islamabad", 'title' => "(GMT+05:00) Islamabad"],
            ['data-offset' => "18000", 'value' => "Karachi", 'title' => "(GMT+05:00) Karachi"],
            ['data-offset' => "18000", 'value' => "Tashkent", 'title' => "(GMT+05:00) Tashkent"],
            ['data-offset' => "19800", 'value' => "Chennai", 'title' => "(GMT+05:30) Chennai"],
            ['data-offset' => "19800", 'value' => "Kolkata", 'title' => "(GMT+05:30) Kolkata"],
            ['data-offset' => "19800", 'value' => "Mumbai", 'title' => "(GMT+05:30) Mumbai"],
            ['data-offset' => "19800", 'value' => "New Delhi", 'title' => "(GMT+05:30) New Delhi"],
            ['data-offset' => "19800", 'value' => "Sri Jayawardenepura", 'title' => "(GMT+05:30) Sri Jayawardenepura"],
            ['data-offset' => "20700", 'value' => "Kathmandu", 'title' => "(GMT+05:45) Kathmandu"],
            ['data-offset' => "21600", 'value' => "Astana", 'title' => "(GMT+06:00) Astana"],
            ['data-offset' => "21600", 'value' => "Dhaka", 'title' => "(GMT+06:00) Dhaka"],
            ['data-offset' => "21600", 'value' => "Almaty", 'title' => "(GMT+06:00) Almaty"],
            ['data-offset' => "21600", 'value' => "Urumqi", 'title' => "(GMT+06:00) Urumqi"],
            ['data-offset' => "23400", 'value' => "Rangoon", 'title' => "(GMT+06:30) Rangoon"],
            ['data-offset' => "25200", 'value' => "Novosibirsk", 'title' => "(GMT+07:00) Novosibirsk"],
            ['data-offset' => "25200", 'value' => "Bangkok", 'title' => "(GMT+07:00) Bangkok"],
            ['data-offset' => "25200", 'value' => "Hanoi", 'title' => "(GMT+07:00) Hanoi"],
            ['data-offset' => "25200", 'value' => "Jakarta", 'title' => "(GMT+07:00) Jakarta"],
            ['data-offset' => "25200", 'value' => "Krasnoyarsk", 'title' => "(GMT+07:00) Krasnoyarsk"],
            ['data-offset' => "28800", 'value' => "Beijing", 'title' => "(GMT+08:00) Beijing"],
            ['data-offset' => "28800", 'value' => "Chongqing", 'title' => "(GMT+08:00) Chongqing"],
            ['data-offset' => "28800", 'value' => "Hong Kong", 'title' => "(GMT+08:00) Hong Kong"],
            ['data-offset' => "28800", 'value' => "Kuala Lumpur", 'title' => "(GMT+08:00) Kuala Lumpur"],
            ['data-offset' => "28800", 'value' => "Singapore", 'title' => "(GMT+08:00) Singapore"],
            ['data-offset' => "28800", 'value' => "Taipei", 'title' => "(GMT+08:00) Taipei"],
            ['data-offset' => "28800", 'value' => "Perth", 'title' => "(GMT+08:00) Perth"],
            ['data-offset' => "28800", 'value' => "Irkutsk", 'title' => "(GMT+08:00) Irkutsk"],
            ['data-offset' => "28800", 'value' => "Ulaan Bataar", 'title' => "(GMT+08:00) Ulaan Bataar"],
            ['data-offset' => "32400", 'value' => "Seoul", 'title' => "(GMT+09:00) Seoul"],
            ['data-offset' => "32400", 'value' => "Osaka", 'title' => "(GMT+09:00) Osaka"],
            ['data-offset' => "32400", 'value' => "Sapporo", 'title' => "(GMT+09:00) Sapporo"],
            ['data-offset' => "32400", 'value' => "Tokyo", 'title' => "(GMT+09:00) Tokyo"],
            ['data-offset' => "32400", 'value' => "Yakutsk", 'title' => "(GMT+09:00) Yakutsk"],
            ['data-offset' => "34200", 'value' => "Darwin", 'title' => "(GMT+09:30) Darwin"],
            ['data-offset' => "34200", 'value' => "Adelaide", 'title' => "(GMT+09:30) Adelaide"],
            ['data-offset' => "36000", 'value' => "Canberra", 'title' => "(GMT+10:00) Canberra"],
            ['data-offset' => "36000", 'value' => "Melbourne", 'title' => "(GMT+10:00) Melbourne"],
            ['data-offset' => "36000", 'value' => "Sydney", 'title' => "(GMT+10:00) Sydney"],
            ['data-offset' => "36000", 'value' => "Brisbane", 'title' => "(GMT+10:00) Brisbane"],
            ['data-offset' => "36000", 'value' => "Hobart", 'title' => "(GMT+10:00) Hobart"],
            ['data-offset' => "36000", 'value' => "Vladivostok", 'title' => "(GMT+10:00) Vladivostok"],
            ['data-offset' => "36000", 'value' => "Guam", 'title' => "(GMT+10:00) Guam"],
            ['data-offset' => "36000", 'value' => "Port Moresby", 'title' => "(GMT+10:00) Port Moresby"],
            ['data-offset' => "36000", 'value' => "Solomon Is.", 'title' => "(GMT+10:00) Solomon Is."],
            ['data-offset' => "39600", 'value' => "Magadan", 'title' => "(GMT+11:00) Magadan"],
            ['data-offset' => "39600", 'value' => "New Caledonia", 'title' => "(GMT+11:00) New Caledonia"],
            ['data-offset' => "43200", 'value' => "Fiji", 'title' => "(GMT+12:00) Fiji"],
            ['data-offset' => "43200", 'value' => "Kamchatka", 'title' => "(GMT+12:00) Kamchatka"],
            ['data-offset' => "43200", 'value' => "Marshall Is.", 'title' => "(GMT+12:00) Marshall Is."],
            ['data-offset' => "43200", 'value' => "Auckland", 'title' => "(GMT+12:00) Auckland"],
            ['data-offset' => "43200", 'value' => "Wellington", 'title' => "(GMT+12:00) Wellington"],
            ['data-offset' => "46800", 'value' => "Nuku'alofa", 'title' => "(GMT+13:00) Nuku'alofa"],
        ];
    }

    /**
     * @return array[]
     */
    public function client_communication(): array
    {
        return [
            ['value' => 1, 'title' => 'Email', 'check' => 'email'],
            ['value' => 2, 'title' => 'SMS', 'check' => 'sms'],
            ['value' => 3, 'title' => 'Phone', 'check' => 'phone']
        ];
    }

    /**
     * @return array[]
     */
    public function gender(): array
    {
        return [
            ['value' => 1, 'title' => 'Man'],
            ['value' => 2, 'title' => 'Woman'],
            ['value' => 3, 'title' => 'Other']
        ];
    }

    /**
     * @return array[]
     */
    public function client_status(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/clients.status_clients.active'), "class" => 'badge badge-success'],
            ["value" => 2, "title" => trans('admin_klikbud/clients.status_clients.disable'), "class" => 'badge badge-warning'],
            ["value" => 3, "title" => trans('admin_klikbud/clients.status_clients.co_work'), "class" => 'badge badge-primary'],
            ["value" => 4, "title" => trans('admin_klikbud/clients.status_clients.ban'), "class" => 'badge badge-danger'],
            ["value" => 5, "title" => trans('admin_klikbud/clients.status_clients.feature'), "class" => 'badge badge-info']
        ];
    }

    /**
     * @return array[]
     */
    public function status_object(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/objects.default_data.status_object.active'), "class" => 'label label-success label-inline mr-2'],
            ["value" => 2, "title" => trans('admin_klikbud/objects.default_data.status_object.not_active'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 3, "title" => trans('admin_klikbud/objects.default_data.status_object.in_progress'), "class" => 'label label-sucess label-inline mr-2'],
            ["value" => 4, "title" => trans('admin_klikbud/objects.default_data.status_object.other'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 5, "title" => trans('admin_klikbud/objects.default_data.status_object.close'), "class" => 'label label-warning label-inline mr-2'],
            ["value" => 6, "title" => trans('admin_klikbud/objects.default_data.status_object.finish'), "class" => 'label label-success label-inline mr-2'],
            ["value" => 7, "title" => trans('admin_klikbud/objects.default_data.status_object.defeat'), "class" => 'label label-danger label-inline mr-2'],
            ["value" => 8, "title" => trans('admin_klikbud/objects.default_data.status_object.cancel'), "class" => 'label label-danger label-inline mr-2']
        ];
    }

    /**
     * @return array[]
     */
    public function type_object(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/objects.default_data.type_object.apartments'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 2, "title" => trans('admin_klikbud/objects.default_data.type_object.house'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 3, "title" => trans('admin_klikbud/objects.default_data.type_object.restaurant'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 4, "title" => trans('admin_klikbud/objects.default_data.type_object.office'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 5, "title" => trans('admin_klikbud/objects.default_data.type_object.town_house'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 6, "title" => trans('admin_klikbud/objects.default_data.type_object.highy_rise_house'), "class" => 'label label-info label-inline mr-2'],
        ];
    }

    /**
     * @return array[]
     */
    public function type_repair_object(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/objects.default_data.type_repair_object.developer'), "class" => 'label label-success label-inline mr-2'],
            ["value" => 2, "title" => trans('admin_klikbud/objects.default_data.type_repair_object.general'), "class" => 'label label-warning label-inline mr-2'],
            ["value" => 3, "title" => trans('admin_klikbud/objects.default_data.type_repair_object.tynki'), "class" => 'label label-info label-inline mr-2'],
            ["value" => 4, "title" => trans('admin_klikbud/objects.default_data.type_repair_object.repair'), "class" => 'label label-primary label-inline mr-2'],
        ];
    }

    /**
     * @return array[]
     */
    public function tools_categories_types(): array
    {
        return [
            ["value" => 1, "title" => 'MainCategory', "class" => 'label label-success label-pill label-inline mr-2'],
            ["value" => 2, "title" => 'HalfCategory', "class" => 'label label-warning label-pill label-inline mr-2'],
            ["value" => 3, "title" => 'Category', "class" => 'label label-info label-pill label-inline mr-2']
        ];
    }

    /**
     * @return array[]
     */
    public function categories_business(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/business.default_data.categories.shop'), "class" => 'label label-light-warning label-pill label-inline mr-2 label-l'],
            ["value" => 2, "title" => trans('admin_klikbud/business.default_data.categories.wholesale'), "class" => 'label label-light-success label-pill label-inline mr-2 label-l'],
            ["value" => 3, "title" => trans('admin_klikbud/business.default_data.categories.refueling'), "class" => 'label label-light-danger label-pill label-inline mr-2 label-l'],
            ["value" => 4, "title" => trans('admin_klikbud/business.default_data.categories.show_tool'), "class" => 'label label-light-info label-pill label-inline mr-2 label-l'],
            ["value" => 5, "title" => trans('admin_klikbud/business.default_data.categories.other'), "class" => 'label label-light-primary label-pill label-inline mr-2 label-l']
        ];
    }

    /**
     * @return array[]
     */
    public function form_business(): array
    {
        return [
            ["value" => 1, "title" => trans('admin_klikbud/business.default_data.form.1.title'), "title_long" => trans('admin_klikbud/business.default_data.form.1.title_long')],
            ["value" => 2, "title" => trans('admin_klikbud/business.default_data.form.2.title'), "title_long" => trans('admin_klikbud/business.default_data.form.2.title_long')],
            ["value" => 3, "title" => trans('admin_klikbud/business.default_data.form.3.title'), "title_long" => trans('admin_klikbud/business.default_data.form.3.title_long')],
            ["value" => 4, "title" => trans('admin_klikbud/business.default_data.form.4.title'), "title_long" => trans('admin_klikbud/business.default_data.form.4.title_long')],
            ["value" => 5, "title" => trans('admin_klikbud/business.default_data.form.5.title'), "title_long" => trans('admin_klikbud/business.default_data.form.5.title_long')],
            ["value" => 6, "title" => trans('admin_klikbud/business.default_data.form.6.title'), "title_long" => trans('admin_klikbud/business.default_data.form.6.title_long')],
            ["value" => 7, "title" => trans('admin_klikbud/business.default_data.form.7.title'), "title_long" => trans('admin_klikbud/business.default_data.form.7.title_long')],
            ["value" => 8, "title" => trans('admin_klikbud/business.default_data.form.8.title'), "title_long" => trans('admin_klikbud/business.default_data.form.8.title_long')],
            ["value" => 99, "title" => trans('admin_klikbud/business.default_data.form.99.title'), "title_long" => trans('admin_klikbud/business.default_data.form.99.title_long')]
        ];
    }

    /**
     * @return array[]
     */
    public function business_types(): array
    {
        return [
            ["value" => 1, 'title' => trans('admin_klikbud/business.default_data.type.business'), "class" => 'font-weight-bold text-success'],
            ["value" => 2, 'title' => trans('admin_klikbud/business.default_data.type.department'), "class" => 'font-weight-bold text-warning']
        ];
    }

    /**
     * @return array[]
     */
    public function status_tools(): array
    {
        return [
            ["value" => 1, 'title' => 'Active', "class" => 'label label-light-warning label-pill label-inline mr-2 label-l'],
            ["value" => 2, 'title' => 'Dont work', "class" => 'label label-light-danger label-pill label-inline mr-2 label-l'],
            ["value" => 3, 'title' => 'In repair', "class" => 'label label-light-danger label-pill label-inline mr-2 label-l'],
            ["value" => 4, 'title' => 'Sell', "class" => 'label label-light-warning label-pill label-inline mr-2 label-l'],
            ["value" => 5, 'title' => 'Destroy', "class" => 'label label-light-warning label-pill label-inline mr-2 label-l'],
            ["value" => 6, 'title' => 'Wkradenyj', "class" => 'label label-light-warning label-pill label-inline mr-2 label-l'],
            ["value" => 7, 'title' => 'Zgubiony', "class" => 'label label-light-warning label-pill label-inline mr-2 label-l'],
        ];
    }

    public function rand_repair_tools_svg()
    {
        return [
            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
                                    <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
                                </g>
                                    </svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M13.5,6 C13.33743,8.28571429 12.7799545,9.78571429 11.8275735,10.5 C11.8275735,10.5 12.5,4 10.5734853,2 C10.5734853,2 10.5734853,5.92857143 8.78777106,9.14285714 C7.95071887,10.6495511 7.00205677,12.1418252 7.00205677,14.1428571 C7.00205677,17 10.4697177,18 12.0049375,18 C13.8025422,18 17,17 17,13.5 C17,12.0608202 15.8333333,9.56082016 13.5,6 Z" fill="#000000"/>
        <path d="M9.72075922,20 L14.2792408,20 C14.7096712,20 15.09181,20.2754301 15.2279241,20.6837722 L16,23 L8,23 L8.77207592,20.6837722 C8.90818997,20.2754301 9.29032881,20 9.72075922,20 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg>', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M18.4246212,12.6464466 L21.2530483,9.81801948 C21.4483105,9.62275734 21.764893,9.62275734 21.9601551,9.81801948 L22.6672619,10.5251263 C22.862524,10.7203884 22.862524,11.0369709 22.6672619,11.232233 L19.8388348,14.0606602 C19.6435726,14.2559223 19.3269901,14.2559223 19.131728,14.0606602 L18.4246212,13.3535534 C18.2293591,13.1582912 18.2293591,12.8417088 18.4246212,12.6464466 Z M3.22182541,17.9497475 L13.1213203,8.05025253 C13.5118446,7.65972824 14.1450096,7.65972824 14.5355339,8.05025253 L15.9497475,9.46446609 C16.3402718,9.85499039 16.3402718,10.4881554 15.9497475,10.8786797 L6.05025253,20.7781746 C5.65972824,21.1686989 5.02656326,21.1686989 4.63603897,20.7781746 L3.22182541,19.363961 C2.83130112,18.9734367 2.83130112,18.3402718 3.22182541,17.9497475 Z" fill="#000000" opacity="0.3"/>
        <path d="M12.3890873,1.28248558 L12.3890873,1.28248558 C15.150511,1.28248558 17.3890873,3.52106183 17.3890873,6.28248558 L17.3890873,10.7824856 C17.3890873,11.058628 17.1652297,11.2824856 16.8890873,11.2824856 L12.8890873,11.2824856 C12.6129449,11.2824856 12.3890873,11.058628 12.3890873,10.7824856 L12.3890873,1.28248558 Z" fill="#000000" transform="translate(14.889087, 6.282486) rotate(-45.000000) translate(-14.889087, -6.282486) "/>
    </g>
</svg>', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M8.46446609,11.2928932 L7.40380592,10.232233 C7.20854378,10.0369709 7.20854378,9.72038841 7.40380592,9.52512627 L8.1109127,8.81801948 C8.30617485,8.62275734 8.62275734,8.62275734 8.81801948,8.81801948 L15.1819805,15.1819805 C15.3772427,15.3772427 15.3772427,15.6938252 15.1819805,15.8890873 L14.4748737,16.5961941 C14.2796116,16.7914562 13.9630291,16.7914562 13.767767,16.5961941 L12.7071068,15.5355339 L7.05025253,21.1923882 C6.26920395,21.9734367 5.00287399,21.9734367 4.22182541,21.1923882 L2.80761184,19.7781746 C2.02656326,18.997126 2.02656326,17.7307961 2.80761184,16.9497475 L8.46446609,11.2928932 Z M4.5753788,18.0104076 C4.38011665,18.2056698 4.38011665,18.5222523 4.5753788,18.7175144 C4.77064094,18.9127766 5.08722343,18.9127766 5.28248558,18.7175144 L9.52512627,14.4748737 C9.72038841,14.2796116 9.72038841,13.9630291 9.52512627,13.767767 C9.32986412,13.5725048 9.01328163,13.5725048 8.81801948,13.767767 L4.5753788,18.0104076 Z" fill="#000000" opacity="0.3"/>
        <path d="M16.9497475,5.63603897 L16.7788182,5.4651097 C16.5835561,5.26984755 16.5835561,4.95326506 16.7788182,4.75800292 C16.8266988,4.71012232 16.8838059,4.67246608 16.9466763,4.64731796 L19.4720576,3.63716542 C19.657766,3.56288206 19.869875,3.60641908 20.0113063,3.74785037 L20.2521496,3.98869366 C20.3935809,4.13012495 20.4371179,4.342234 20.3628346,4.52794239 L19.352682,7.05332375 C19.2501253,7.30971551 18.9591401,7.43442346 18.7027484,7.33186676 C18.6398781,7.30671864 18.5827709,7.2690624 18.5348903,7.2211818 L18.363961,7.05025253 L12.7071068,12.7071068 L11.2928932,11.2928932 L16.9497475,5.63603897 Z" fill="#000000"/>
    </g>
</svg>', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000"/>
    </g>
</svg>'
        ];
    }
}
