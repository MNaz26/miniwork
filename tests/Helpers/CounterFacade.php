<?php

namespace Tests\Helpers;

use Miniwork\Facades\Facade;

/**
 * @method static int getCounter()
 * @method static void setCounter(int $num)
 */
class CounterFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'counter';
    }
}