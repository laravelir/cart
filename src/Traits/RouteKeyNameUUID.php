<?php

namespace Laravelir\Cart\Traits;

trait RouteKeyNameUUID
{
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
