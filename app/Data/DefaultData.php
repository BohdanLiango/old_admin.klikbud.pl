<?php


namespace App\Data;


class DefaultData extends Data
{
    public function address(): array
    {
        return [
            ["value" => 1, "title" => "Państwo", "class" => 'label label-success label-pill label-inline mr-2'],
            ["value" => 2, "title" => "Wojewódzstwo", "class" => 'label label-warning label-pill label-inline mr-2'],
            ["value" => 3, "title" => "Miasto", "class" => 'label label-info label-pill label-inline mr-2'],
            ["value" => 4, "title" => "Ulica", "class" => 'label label-danger label-pill label-inline mr-2'],
        ];
    }
}
