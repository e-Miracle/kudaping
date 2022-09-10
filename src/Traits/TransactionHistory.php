<?php


namespace eMiracle\Kudaping\Traits;


trait TransactionHistory
{
    public function getTransactionLogs(
        array $data,
        int $pageSize = 1,
        int $pageNumber= 10,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'RequestReference' => $data['RequestReference'],
            'ResponseReference' => $data['ResponseReference'],
            'TransactionDate'=>$data['TransactionDate'],
            'HasTransactionDateRangeFilter'=>$data['HasTransactionDateRangeFilter']??false,
            'StartDate'=>$data['StartDate'],
            'EndDate'=>$data['EndDate'],
            'PageSize'=>$pageSize,
            'PageNumber'=>$pageNumber
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'RETRIEVE_TRANSACTION_LOGS',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function kudaAccountTransactionHistory(
        int $pageSize = 1,
        int $pageNumber = 1,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'pageSize'=>$pageSize,
            'pageNumber'=>$pageNumber
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_MAIN_ACCOUNT_TRANSACTIONS',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function filteredKudaAccountTransactionHistory(
        string $startDate,
        string $endDate,
        int $pageSize = 1,
        int $pageNumber = 1,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'startDate'=>$startDate,
            'endDate'=>$endDate,
            'pageSize'=>$pageSize,
            'pageNumber'=>$pageNumber
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_MAIN_ACCOUNT_FILTERED_TRANSACTIONS',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function virtualAccountTransactionHistory(
        string $trackingReference,
        int $pageNumber = 1,
        int $pageSize = 1,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'trackingReference'=>$trackingReference,
            'pageNumber'=>$pageNumber,
            'pageSize'=>$pageSize
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_VIRTUAL_ACCOUNT_TRANSACTIONS',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }

    public function filteredVirtualAccountTransactionHistory(
        string $trackingReference,
        string $startDate,
        string $endDate,
        int $pageNumber = 1,
        int $pageSize = 1,
        string $reference = null
    ):array
    {
        if (is_null($reference)){
            $reference = $this->generateRequestReference();
        }

        $data = [
            'trackingReference'=>$trackingReference,
            'pageNumber'=>$pageNumber,
            'pageSize'=>$pageSize,
            'startDate'=>$startDate,
            'endDate'=>$endDate
        ];

        return [
            'body'=>$this->sendRequestWithRef(
                'ADMIN_VIRTUAL_ACCOUNT_FILTERED_TRANSACTIONS',
                $reference,
                $data
            ),
            'param'=>$data,
            'reference'=>$reference
        ];
    }
}
