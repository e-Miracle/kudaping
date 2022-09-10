<?php


namespace eMiracle\Kudaping\Traits;


trait ReferenceTrait
{
    private function generateRequestReference():string
    {
        return uniqid(time());
    }

    public function generateTransactionReference():string
    {
        return $this->transactionPrefix . '_' . uniqid(time());
    }
}
