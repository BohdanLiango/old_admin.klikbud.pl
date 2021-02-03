<?php

namespace App\Http\Livewire\Settings\Klikbud\Home\MainSlider;

use App\Data\DefaultData;
use App\Models\KLIKBUD\MainSlider;
use App\Services\Settings\Klikbud\Home\MainSliderService;
use Livewire\WithPagination;

class Show extends MainSliderLivewire
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

        $count_get = MainSlider::select('status_to_main_page_id')->get();
        $count_active_status = $count_get->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.visible'))->count();
        $count_hidden_status = $count_get->where('status_to_main_page_id', '=', config('klikbud.klikbud.status_to_main_page.not_visible'))->count();
        $count = $count_get->count();
        $count_deleted = MainSlider::withTrashed()->count();

        $all_sliders = $count_deleted + $count;


        if($count === 0)
        {
            $percent_all_active = 0;
            $percent_to_active_all = 0;
            $percent_to_hidden_all = 0;
            $percent_all_deleted = 0;
        }else{
            $percent_all_active = round($count / $all_sliders * 100, 2);
            $percent_all_deleted = round($count_deleted / $all_sliders * 100, 2);
            $percent_to_active_all = round($count_active_status / $count * 100,2);
            $percent_to_hidden_all = round($count_hidden_status / $count * 100,2);
        }


        return view('livewire.settings.klikbud.home.main-slider.show',
            compact('sliders', 'count', 'status_to_main_page',
                'count_active_status', 'count_hidden_status', 'count_deleted', 'all_sliders',
                'percent_to_active_all', 'percent_to_hidden_all', 'percent_all_active', 'percent_all_deleted'));
    }

    public function changeStatusInMainPage($slider_id, $status_id)
    {
        $this->checkStatus(
            app()->make(MainSliderService::class)->changeStatusToMainPage($slider_id, $status_id),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.changeStatusSuccess'),
            'alert', true,'top-end'
        );
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

    public function delete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $this->checkStatus(
            app()->make(MainSliderService::class)->delete($this->selectedItem),
            trans('admin_klikbud/settings/klikbud/main-slider.error.sessions.delete'),
            'alert', true,'top-end'
        );
    }
}
