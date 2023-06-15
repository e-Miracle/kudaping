<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait StaticVirtualAccount
{
    public function createStaticVirtualAccount(
        array $data,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_CREATE_VIRTUAL_ACCOUNT',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function updateStaticVirtualAccount(
        array $data,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_UPDATE_VIRTUAL_ACCOUNT',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function retrieveAllVirtualAccountDetails(
        int $pageSize=1,
        int $pageNumber=1
    ):array
    {
        $data = [
            'pageSize'=>$pageSize,
            'pageNumber'=>$pageNumber
        ];
        return [
            'body'=>$this->sendRequestWithoutRef(
                'ADMIN_VIRTUAL_ACCOUNTS',
                $data
            ),
            'param'=>$data,
            'reference'=>''
        ];
    }

    public function getVirtualAccountDetail(
        string $trackingReference
    ):array
    {
        $data = [
            'trackingReference'=>$trackingReference
        ];
        return [
            'body'=>$this->sendRequestWithoutRef(
                'ADMIN_RETRIEVE_SINGLE_VIRTUAL_ACCOUNT',
                $data
            ),
            'param'=>$data,
            'reference'=>''
        ];
    }

    public function disableVirtualAccount(
        string $transactionReference,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'transactionReference'=>$transactionReference
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_DISABLE_VIRTUAL_ACCOUNT',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function enableVirtualAccount(
        string $transactionReference,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'transactionReference'=>$transactionReference
        ];
        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_ENABLE_VIRTUAL_ACCOUNT',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function fundVirtualAccount(
        string $trackingReference,
        string $amount,
        string $narration,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'trackingReference'=>$trackingReference,
            'amount'=>$amount,
            'narration'=>$narration
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'FUND_VIRTUAL_ACCOUNT',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function withdrawFromVirtualAccount(
        string $trackingReference,
        string $amount,
        string $narration,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'trackingReference'=>$trackingReference,
            'amount'=>$amount,
            'narration'=>$narration
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'WITHDRAW_VIRTUAL_ACCOUNT',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }
}
