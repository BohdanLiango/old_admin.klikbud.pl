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
            ["value" => 1, "title" => "Państwo", "class" => 'label label-success label-pill label-inline mr-2'],
            ["value" => 2, "title" => "Wojewódzstwo", "class" => 'label label-warning label-pill label-inline mr-2'],
            ["value" => 3, "title" => "Miasto", "class" => 'label label-info label-pill label-inline mr-2'],
            ["value" => 4, "title" => "Ulica", "class" => 'label label-danger label-pill label-inline mr-2'],
        ];
    }

    /**
     * @return array[]
     */
    public function klikbud_gallery_categories(): array
    {
        return [
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
           ['value' => 1, 'title' => trans('admin_klikbud/settings/klikbud/all.status_to_main_page.active'), 'class' => 'success'],
           ['value' => 2, 'title' => trans('admin_klikbud/settings/klikbud/all.status_to_main_page.hidden'), 'class' => 'danger'],
       ];
    }
}
