<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait BankList
{
    public function getBankList($reference = null)
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }
        return [
            'body'=>$this->sendRequestWithRef(
                'BANK_LIST',
                $reference,
                []
            ),
            'param'=>[],
            'reference'=>$reference
        ];
    }
}
