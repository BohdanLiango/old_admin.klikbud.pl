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
}
