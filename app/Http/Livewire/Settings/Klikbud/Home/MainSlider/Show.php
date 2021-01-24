<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Models\KLIKBUD\MainSlider;
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
    }

    public function render()
    {
        $sliders = MainSlider::when($this->searchQuery != '', function ($query) {
            $query->where('textYellow', 'like', '%' . $this->searchQuery . '%')->orWhere('textBlack', 'like', '%' . $this->searchQuery . '%');
        })
            ->when($this->searchStatus != '', function ($query) {
                $query->where('status_to_main_page_id', $this->searchStatus);
            })
            ->orderBy('ID', 'desc')->paginate(12);

        return view('livewire.settings.klikbud.home.main-slider.show',
            compact('sliders'));
    }

    /**
     * @param $slider_id
     * @param $status_id
     */
    public function changeStatusInMainPage($slider_id, $status_id)
    {
        $update = MainSlider::findOrFail($slider_id);
        $update->status_to_main_page_id = $status_id;
        $update->save();

        session()->flash('message', 'Status na głownej stronie zmieniony!');
        session()->flash('alert-type', 'warning');
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
      $this->image_data = $showData->image->file_view;

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
        MainSlider::findOrFail($this->selectedItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');
        session()->flash('message', 'Suwak usunięty!');
        session()->flash('alert-type', 'success');
    }
}
