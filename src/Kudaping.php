<?php


namespace eMiracle\Kudaping;


use eMiracle\Kudaping\Traits\AccountBalance;
use eMiracle\Kudaping\Traits\BankList;
use eMiracle\Kudaping\Traits\EnvironmentInitializer;
use eMiracle\Kudaping\Traits\HttpTrait;
use eMiracle\Kudaping\Traits\KudaEncryption;
use eMiracle\Kudaping\Traits\ReferenceTrait;
use eMiracle\Kudaping\Traits\SendMoney;
use eMiracle\Kudaping\Traits\StaticVirtualAccount;
use eMiracle\Kudaping\Traits\TransactionHistory;
use eMiracle\Kudaping\Traits\Enquiry;

final class Kudaping
{
    use KudaEncryption,
        HttpTrait,
        EnvironmentInitializer,
        ReferenceTrait,
        StaticVirtualAccount,
        BankList,
        SendMoney,
        AccountBalance,
        TransactionHistory,
        Enquiry;
    private string $emailAddress,
        $apiKey,
        $environment,
        $liveUrl,
        $testUrl,
        $cacheKey,
        $transactionPrefix;

    public function __construct()
    {
        $this->emailAddress = config('kudaping.emailAddress');
        $this->apiKey = config('kudaping.apiKey');
        $this->environment = config('kudaping.environment');
        $this->transactionPrefix = config('kudaping.transactionPrefix');
        $this->liveUrl = config('kudaping.liveUrl');
        $this->testUrl = config('kudaping.testUrl');
        $this->cacheKey = config('kudaping.cacheKey');
    }
}
