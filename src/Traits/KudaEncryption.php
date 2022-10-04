<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

trait KudaEncryption
{
    public function generateEncryption(): string
    {
        return Cache::remember($this->cacheKey, Carbon::now()->addMinutes(12), function (){
            return Http::withBody(json_encode([
                'apiKey'=>$this->apiKey, 'email'=>$this->emailAddress
            ]), 'application/json')->post(
                $this->getUrl().'/Account/GetToken',
            )->body();
        });
    }
}
