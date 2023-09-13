<?php

namespace Alpha\Components\Cache;

use Alpha\Contracts\CacheAdapterInterface;

require_once 'functions.php';

class CacheFactory
{
    public static function make(array $config): CacheAdapterInterface
    {
        $adapter = $config['adapter'];
        unset($config['adapter']);

        return match ($adapter) {
            'redis' => new RedisAdapter($config),
            default => throw new \InvalidArgumentException("Неизвестный адаптер: $adapter"),
        };
    }
}