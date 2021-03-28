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

}
