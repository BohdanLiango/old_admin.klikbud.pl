<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use Livewire\Component;

class MainSliderLivewire extends Component
{
    public function checkStatus($status, $message_success, $method, $toast, $position): void
    {
        if($status === true)
        {

            $this->$method('success', $message_success, [
                'position' =>  $position,
                'timer' =>  3000,
                'toast' =>  $toast,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  true,
            ]);

        }elseif($status === false){

            $this->$method('error', trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.messageDanger'), [
                'position' =>  'center',
                'timer' =>  3000,
                'toast' =>  $toast,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }else {
            abort(403);
        }
    }
}
