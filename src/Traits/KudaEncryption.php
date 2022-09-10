<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait KudaEncryption
{
    public function generateEncryption(): string
    {
        return Http::withBody(json_encode([
            'apiKey'=>$this->apiKey, 'email'=>$this->emailAddress
        ]), 'application/json')->post(
            $this->getUrl().'/Account/GetToken',
            )->body();
    }
}
