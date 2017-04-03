<?php

namespace Bestit\HipChat\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class HipChat
 *
 * @package Bestit\HipChat\Facade
 */
class HipChat extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hipchat';
    }
}
