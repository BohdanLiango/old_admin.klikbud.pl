<?php

namespace App\Http\Livewire\Warehouses\Tools\Category;

use App\Http\Livewire\Settings\Settings;

class Category extends Settings
{
    public function typeAddEditTitle($type_id)
    {
        return match ((int)$type_id) {
            1 => trans('admin_klikbud/warehouse/toolsCategory.main_category'),
            2 => trans('admin_klikbud/warehouse/toolsCategory.half_category'),
            3 => trans('admin_klikbud/warehouse/toolsCategory.category'),
        };
    }
}
