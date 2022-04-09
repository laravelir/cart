<?php

namespace Laravelir\Cart\Drivers;

class CookieDriver extends Driver
{

    public function add(array $data)
    {
        cookie()->queue('name', $data->toJson(), 60 * 24 * 7);

        $cart = collect(json_decode(cookie('name', true))) ?? collect([]);
    }
}
