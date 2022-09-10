<?php


namespace eMiracle\Kudaping\Traits;


trait AccountBalance
{
    public function checkAdminAccountBalance():array
    {
        return [
            'body'=>$this->sendRequestWithoutRef(
                'ADMIN_RETRIEVE_MAIN_ACCOUNT_BALANCE',
                []
            )
        ];
    }

    public function checkVirtualAccountBalance(string $trackingReference = null, string $requestReference = null):array
    {
        if (is_null($trackingReference)){
            $trackingReference = $this->generateTransactionReference();
        }

        if (is_null($requestReference)){
            $requestReference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'RETRIEVE_VIRTUAL_ACCOUNT_BALANCE',
                $requestReference,
                ['trackingReference'=>$trackingReference]
            ),
            'reference'=>$requestReference
        ];
    }
}
