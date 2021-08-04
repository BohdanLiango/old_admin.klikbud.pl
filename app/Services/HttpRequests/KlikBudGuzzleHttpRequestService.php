<?php

namespace App\Services\HttpRequests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class KlikBudGuzzleHttpRequestService
{
    public function clearCacheRequest(): void
    {
        try {
            (new Client())->request('GET', config('klikbud.url_to_clear_cache'));
        }catch (\Exception $e){
            Log::info($e->getMessage());
        } catch (GuzzleException $e) {
            Log::info($e->getMessage());
        }
    }
}
