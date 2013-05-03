<?php

namespace Ensiie\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EnsiieUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
