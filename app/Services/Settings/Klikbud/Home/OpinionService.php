<?php

namespace App\Services\Settings\Klikbud\Home;

use App\Models\KLIKBUD\Opinion;
use App\Services\Services;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OpinionService extends Services
{
    /**
     * @param $name
     * @param $service_id
     * @param $stars
     * @param $portal_opinion_id
     * @param $opinion
     * @param $date_add
     * @return bool
     */
    public function store($name, $service_id, $stars, $portal_opinion_id, $opinion, $date_add): bool
    {
        try {
            $data = [
                'name' => $name,
                'service_id' => $service_id,
                'stars' => $stars,
                'portal_opinion_id' => $portal_opinion_id,
                'user_id' => Auth::id(),
                'opinion' => $opinion,
                'date_add' => Carbon::createFromFormat('d/m/Y',$date_add)->format('Y-m-d')
            ];
            Opinion::create($data);
            return true;
        }catch (Exception){
            return false;
        }
    }


    public function update($id, $data)
    {
        try {
            Opinion::findOrFail($id)->update($data);
            $response = (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @param $status_id
     * @return bool
     */
    public function changeStatusToMainPage($id, $status_id): bool
    {
        try {
            Opinion::findOrfail($id)->update(['status_to_main_page_id' => $status_id]);
            $response = (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
            return true;
        }catch (Exception){
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            Opinion::findOrFail($id)->delete();
            $response = (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
            return true;
        }catch (Exception){
            return false;
        }
    }

}
