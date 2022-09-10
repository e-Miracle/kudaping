<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait HttpTrait
{
    public function sendRequestWithRef(string $serviceType, string $requestRef, array $data)
    {
        return Http::withToken($this->generateEncryption())->withBody(
            json_encode([
                'data'=>json_encode([
                    'serviceType'=>$serviceType,
                    'requestRef'=>$requestRef,
                    'data'=>json_encode($data)
                ])
            ]), 'application/json'
        )->post($this->getUrl())->json();
    }

    public function sendRequestWithoutRef(string $serviceType, array $data)
    {
        return Http::withToken($this->generateEncryption())->withBody(
            json_encode([
                'data'=>json_encode([
                    'serviceType'=>$serviceType,
                    'data'=>json_encode($data)
                ])
            ]), 'application/json'
        )->post($this->getUrl())->json();
    }
}
