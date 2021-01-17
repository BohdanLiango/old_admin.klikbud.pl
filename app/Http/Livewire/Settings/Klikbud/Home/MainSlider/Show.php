<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Models\KLIKBUD\MainSlider;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public function render()
    {
        $sliders = MainSlider::paginate(12);

        return view('livewire.settings.klikbud.home.main-slider.show', compact('sliders'));
    }
}
