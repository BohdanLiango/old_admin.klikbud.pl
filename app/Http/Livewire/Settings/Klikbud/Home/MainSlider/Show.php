<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Data\DefaultData;
use App\Models\KLIKBUD\MainSlider;
use App\Services\Settings\Klikbud\Home\MainSliderService;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $searchQuery;
    public $searchStatus;

    public $actions;
    public $selectedItem;
    public $textYellow_data, $textBlack_data, $image_data;

    public function mount()
    {
        $this->searchQuery = '';
        $this->searchStatus = '';
        $this->selectedItem = '';
    }

    public function render()
    {
        $sliders = MainSlider::when($this->searchQuery != '', function ($query) {
            $query->where('textYellow', 'like', '%' . $this->searchQuery . '%')
                ->orWhere('textBlack', 'like', '%' . $this->searchQuery . '%');
        })
            ->when($this->searchStatus != '', function ($query) {
                $query->where('status_to_main_page_id', $this->searchStatus);
            })
            ->orderBy('ID', 'desc')->paginate(12);

        $status_to_main_page = app()->make(DefaultData::class)->klikbud_status_to_main_page();

        $count = MainSlider::count();

        return view('livewire.settings.klikbud.home.main-slider.show',
            compact('sliders', 'count', 'status_to_main_page'));
    }

    private function checkStatus($status, $message_success)
    {
        if($status === true)
        {
            session()->flash('message', $message_success);
            session()->flash('alert-type', 'success');
        }elseif($status === false){
            session()->flash('message', trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.messageDanger'));
            session()->flash('alert-type', 'danger');
        }else {
            abort(403);
        }
    }

    public function changeStatusInMainPage($slider_id, $status_id)
    {
        $this->checkStatus(
            app()->make(MainSliderService::class)->changeStatusToMainPage($slider_id, $status_id),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.changeStatusSuccess')
        );
    }

    /**
     * @param $slider_id
     * @return string
     */
    public function editRoute($slider_id)
    {
        return redirect()->route('settings.klikbud.home.slider.edit', $slider_id);
    }

    public function cancel()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

  public function selectItem($itemId, $action)
  {
      $this->selectedItem = $itemId;

      $showData = MainSlider::findOrFail($itemId);

      $this->textBlack_data = $showData->textBlack['pl'];
      $this->textYellow_data = $showData->textYellow['pl'];
      $this->image_data = $showData->image->path;

      if($action === 'delete')
      {
          $this->dispatchBrowserEvent('openDeleteModal');
      }
  }
    /**
     * @param $id
     */
    public function delete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->checkStatus(
            app()->make(MainSliderService::class)->delete($this->selectedItem),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.delete')
        );
    }
}
