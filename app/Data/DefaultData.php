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
            ["value" => config('app.address.country'), "title" => trans('data/address/types.country'), "class" => 'success', "route_value" => 'country'],
            ["value" => config('app.address.state'), "title" => trans('data/address/types.state'), "class" => 'info', "route_value" => 'state'],
            ["value" => config('app.address.town'), "title" => trans('data/address/types.town'), "class" => 'primary', "route_value" => 'town'],
            ["value" => config('app.address.street'), "title" => trans('data/address/types.street'), "class" => 'warning', "route_value" => 'street'],
        ];
    }
}
