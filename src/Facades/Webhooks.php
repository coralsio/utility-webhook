<?php

namespace Corals\Modules\Utility\Webhook\Facades;

use Illuminate\Support\Facades\Facade;

class Webhooks extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return \Corals\Modules\Utility\Webhook\Classes\Webhooks::class;
    }
}
