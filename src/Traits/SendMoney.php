<?php


namespace eMiracle\Kudaping\Traits;


use Illuminate\Support\Facades\Http;

trait SendMoney
{
    public function confirmTransferRecipient(
        string $beneficiaryAccountNumber,
        string $beneficiaryBankCode,
        string $senderTrackingReference = '',
        bool $isRequestFromVirtualAccount = false
    ):array
    {
        $data = [
            'beneficiaryAccountNumber'=>$beneficiaryAccountNumber,
            'beneficiaryBankCode'=>$beneficiaryBankCode,
            'isRequestFromVirtualAccount'=>$isRequestFromVirtualAccount,
            'senderTrackingReference'=>$senderTrackingReference
        ];

        return [
            'body'=>$this->sendRequestWithoutRef(
                'NAME_ENQUIRY',
                $data
            ),
            'param'=>$data,
            'reference'=>''
        ];
    }

    public function sendMoney(
        array $data,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'SINGLE_FUND_TRANSFER',
                $reference,
                $data
            ),
            'reference'=>$reference,
            'param'=>$data
        ];
    }

    public function sendMoneyFromVirtual(
        array $data,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'VIRTUAL_ACCOUNT_FUND_TRANSFER',
                $reference,
                $data
            ),
            'reference'=>$reference,
            'param'=>$data
        ];
    }

    public function sendTransferInstruction(
        array $data,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        return [
            'body'=>$this->sendRequestWithRef(
                'FUND_TRANSFER_INSTRUCTION',
                $reference,
                $data
            ),
            'reference'=>$reference,
            'param'=>$data
        ];
    }

    public function retrieveInstruction(
        string $accountNumber,
        string $originalRequestReference,
        int $amount,
        string $status,
        int $pageNumber = 1,
        int $pageSize = 10,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            "AccountNumber"=>$accountNumber,
            "Reference"=>$reference,
            "Amount"=>$amount,
            "OriginalRequestRef"=>$originalRequestReference,
            "Status"=>$status,
            "PageNumber"=>$pageNumber,
            "PageSize"=>$pageSize
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'SEARCH_FUND_TRANSFER_INSTRUCTION',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function checkTransferStatus(
        string $transactionRequestReference,
        bool $isThirdPartyBankTransfer = false,
        string $reference = null,
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            "transactionRequestReference"=>$transactionRequestReference,
            "isThirdPartyBankTransfer"=>$isThirdPartyBankTransfer
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'TRANSACTION_STATUS_QUERY',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }
}
