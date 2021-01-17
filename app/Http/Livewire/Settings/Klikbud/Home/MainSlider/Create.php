<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $image;

    public function uploatedImage()
    {
        $this->validate(['image' => 'image|max:1024']);
    }

    public function render()
    {
        return view('livewire.settings.klikbud.home.main-slider.create');
    }
}
