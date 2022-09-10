<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait BankList
{
    public function getBankList()
    {
        return [
            'body'=>$this->sendRequestWithRef(
                'BANK_LIST',
                $this->generateRequestReference(),
                []
            ),
        ];
    }
}
