<?php


namespace eMiracle\Kudaping\Traits;


trait EnvironmentInitializer
{
    protected function getUrl()
    {
        return $this->environment === 'live'?$this->liveUrl:$this->testUrl;
    }
}
