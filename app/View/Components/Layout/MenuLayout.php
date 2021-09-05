<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class MenuLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.components.aside_menu');
    }
}
