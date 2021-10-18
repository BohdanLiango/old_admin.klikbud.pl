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
            ["value" => config('app.address.country'), "title" => trans('data/address/types.country'), "class" => 'success'],
            ["value" => config('app.address.state'), "title" => trans('data/address/types.state'), "class" => 'info'],
            ["value" => config('app.address.town'), "title" => trans('data/address/types.town'), "class" => 'primary'],
            ["value" => config('app.address.street'), "title" => trans('data/address/types.street'), "class" => 'warning'],
        ];
    }
}
