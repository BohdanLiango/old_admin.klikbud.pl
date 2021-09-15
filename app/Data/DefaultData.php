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
            ["value" => 1, "title" => trans('data/address/types.country'), "class" => 'success'],
            ["value" => 2, "title" => trans('data/address/types.state'), "class" => 'info'],
            ["value" => 3, "title" => trans('data/address/types.town'), "class" => 'primary'],
            ["value" => 4, "title" => trans('data/address/types.street'), "class" => 'warning'],
        ];
    }
}
