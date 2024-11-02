<?php

namespace Miniwork\Facades;

use Exception;
use Miniwork\Container;
use Miniwork\Framework;

abstract class Facade
{
    protected static ?Container $app;

    abstract protected static function getFacadeAccessor(): string;

    /**
     * @throws Exception
     */
    public static function __callStatic(string $method, array $parameters)
    {
        return static::resolveFacadeInstance()->$method(...$parameters);
    }

    /**
     * @return bool
     * @throws Exception
     */
    private static function isSharedAccessor(): bool
    {
        return static::$app->isShared(static::getFacadeAccessor());
    }

    /**
     * @return object
     * @throws Exception
     */
    protected static function resolveFacadeInstance(): object
    {
        if (!static::$app) {
            static::$app = Framework::getInstance();
        }

        if (!static::isSharedAccessor()) {
            throw new Exception('Accessor is shared, memory leak possible');
        }

        return static::$app->make(static::getFacadeAccessor());
    }

    /**
     * @param Container|null $app
     * @return void
     */
    public static function setFacadeApplication(?Container $app): void
    {
        static::$app = $app;
    }
}