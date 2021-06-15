<?php

namespace App\Data;

class BreadcrumbsData extends Data
{
    private string $dashboard = 'Dashboard';
    private string $address = 'Adresy';
    private string $klikbudMainslider = 'Suwak';
    private string $klikbudService = 'Usługi';
    private string $klikbudCount = 'Liczniki';
    private string $klikbudOpinin = 'Opinie';
    private string $klikbudGallery = 'Galeria';
    private string $klikbudContact = 'Kontakt';
    private string $klikbudNewsletter = 'Newsletter';
    private string $clients = 'Clients';
    private string $objects = 'Objects';
    private string $categories = 'Kategorie';
    private string $tools = 'Narzędzia';
    private string $business = 'Firmy';
    private string $tools_cart = 'Koszyk';

    /**
     * Main functions
     *
     * @param $key
     * @param $array
     * @param $array_merge
     * @return array
     */
    public function breadcrumbs($key, $array, $array_merge): array
    {
        if($array_merge !== NULL)
        {
            $array_store = array_merge($array, $array_merge);
        }else{
            $array_store = $array;
        }

        $collection = collect($array_store);
        return  $collection->where('key', '<=', $key)->all();
    }

    /**
     * DashboardController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function dashboard($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * AddressController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_address($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.address.show'), 'name' => $this->address]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * MainSliderController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_mainslider($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.slider.index'), 'name' => $this->klikbudMainslider]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * ServiceController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_service($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.service.index'), 'name' => $this->klikbudService]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * CountController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_count($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.count.index'), 'name' => $this->klikbudCount]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * OpinionController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_home_opinion($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.home.opinion.index'), 'name' => $this->klikbudOpinin]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * GalleryController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_gallery($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.gallery.index'), 'name' => $this->klikbudGallery]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * ContactController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_contact($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.contact.index'), 'name' => $this->klikbudContact]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * ContactController
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function settings_klikbud_newsletter($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('settings.klikbud.newsletter'), 'name' => $this->klikbudNewsletter]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * ClientsLivewire
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function clients($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('clients.show'), 'name' => $this->clients]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * ObjectsLivewire
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function objects($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('objects.all'), 'name' => $this->objects]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function tools_categories($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('warehouses.tools.show'), 'name' => $this->tools],
            ['key' => 2, 'link' => route('warehouses.tools.categories.show'), 'name' => $this->categories]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * BusinessLivewire
     *
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function business($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('business.show'), 'name' => $this->business]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

    /**
     * @param $key
     * @param $array_merge
     * @return array
     */
    public function tools($key, $array_merge): array
    {
        $array = [
            ['key' => 0, 'link' => route('dashboard'), 'name' => $this->dashboard],
            ['key' => 1, 'link' => route('warehouses.tools.show'), 'name' => $this->tools],
            ['key' => 2, 'link' => route('warehouses.tools.cart.show'), 'name' => $this->tools_cart]
        ];

        return $this->breadcrumbs($key, $array, $array_merge);
    }

}
