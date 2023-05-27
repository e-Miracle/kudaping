<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait HttpTrait
{
    public function sendRequestWithRef(string $serviceType, string $requestRef, array $data)
    {
        return Http::withToken($this->generateEncryption())->withBody(
            json_encode([
                'ServiceType'=>$serviceType,
                'RequestRef'=>$requestRef,
                'Data'=>json_encode($data)
            ]), 'application/json'
        )->post($this->getUrl())->json();
    }

    public function sendRequestWithoutRef(string $serviceType, array $data)
    {
        return Http::withToken($this->generateEncryption())->withBody(
            json_encode([
                'ServiceType'=>$serviceType,
                'Data'=>json_encode($data)
            ]), 'application/json'
        )->post($this->getUrl())->json();
    }
}
