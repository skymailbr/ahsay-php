<?php

namespace Ahsay\Api\System;

use Ahsay\Api\AbstractApi;

class Config extends AbstractApi
{
    public function getSystemSetting(): array
    {
        return $this->getClient()->request('GetSystemSetting.do', [], '2');
    }

    public function getLicense(): array
    {
        return $this->getClient()->request('GetLicense.do');
    }

    public function getReplicationMode(): array
    {
        return $this->getClient()->request('GetReplicationMode.do');
    }
}
