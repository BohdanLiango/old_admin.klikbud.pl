<?php

namespace App\Http\Livewire\Business;

use App\Data\BreadcrumbsData;
use App\Data\DefaultData;
use App\Services\Business\BusinessService;

class ShowLivewire extends Business
{
    public $business = [], $get_data, $modal_id = NULL;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        $breadcrumbs = app()->make(BreadcrumbsData::class)->clients(1, NULL);
        $page_title = $breadcrumbs[1]['name'];
        $categories = app()->make(DefaultData::class)->categories_business();
        $business_form = app()->make(DefaultData::class)->form_business();
        $types = app()->make(DefaultData::class)->business_types();
        return view('livewire.business.show-livewire', compact('categories', 'business_form', 'types'))
            ->extends('layout.default', ['breadcrumbs' => $breadcrumbs, 'page_title' => $page_title])
            ->section('content');
    }

    public function mount($slug)
    {
        $get_data = app()->make(BusinessService::class)->getDataOneBySlug($slug);
        $this->get_data = $get_data;
        $this->business['id'] = $get_data->id;
        $this->business['type_id'] = $get_data->type_id;
        $this->business['title'] = $get_data->title;
        $this->business['title_short'] = $get_data->title_short;
        $this->business['business_form_id'] = $get_data->business_form_id;
        $this->business['business_form_other'] = $get_data->business_form_other;
        $this->business['image_id'] = $get_data->image_id;
        $this->business['is_manufacturer'] = $get_data->is_manufacturer;
        $this->business['description'] = $get_data->description;
        $this->business['category_id'] = $get_data->category_id;
        $this->business['country_id'] = $get_data->country_id;
        $this->business['state_id'] = $get_data->state_id;
        $this->business['town_id'] = $get_data->town_id;
        $this->business['street_id'] = $get_data->street_id;
        $this->business['number'] = $get_data->number;
        $this->business['apartment_number'] = $get_data->apartment_number;
        $this->business['zip_code'] = $get_data->zip_code;
        $this->business['nip'] = $get_data->NIP;
        $this->business['regon'] = $get_data->REGON;
        $this->business['bdo'] = $get_data->BDO;
        $this->business['email'] = $get_data->email;
        $this->business['phone'] = $get_data->phone;
        $this->business['site'] = $get_data->site;
        $this->business['business_id'] = $get_data->business_id;
        $this->business['user_id'] = $get_data->user_id;
        $this->business['created_at'] = date('d/m/Y', strtotime($get_data->created_at));
        $this->business['slug'] = $slug;
    }

    public function opensModals($modal, $id)
    {
        $this->modal_id = $id;

        switch ($modal){
            case 'delete':
                $this->dispatchBrowserEvent('openDeleteModal');
                break;
            case 'deleteClose':
                $this->dispatchBrowserEvent('closeDeleteModal');
                break;
            case 'deleteDepartment':
                $this->dispatchBrowserEvent('openDeleteDepartmentModal');
                break;
            case 'deleteCloseDepartment':
                $this->dispatchBrowserEvent('closeDeleteDepartmentModal');
                break;
        }
    }

    public function delete()
    {
        $this->dispatchBrowserEvent('closeDeleteModal');
        $status = app()->make(BusinessService::class)->delete($this->business['id'], $this->business['image_id']);
        $message = $this->business['title'] . ' ' . trans('admin_klikbud/business.show.delete.message_business');
        $this->checkStatus($status, $message, 'flash', false, 'center');
        return redirect()->route('business.show');
    }

    public function delete_department()
    {
        $status = app()->make(BusinessService::class)->delete($this->modal_id,NULL);
        $this->dispatchBrowserEvent('closeDeleteDepartmentModal');
        $this->checkStatus($status, trans('admin_klikbud/business.show.delete.message_department'), 'alert', true, 'top-end');
        $this->emit('refreshComponent');
    }
}
