<?php

namespace Itkg\ApiDocBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ItkgApiDocBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'NelmioApiDocBundle';
    }
}
