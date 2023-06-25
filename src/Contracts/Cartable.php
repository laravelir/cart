<?php

namespace Laravelir\Cart\Contract;

interface Cartable
{
    public function getCartableId();
    public function getCartableTitle();
    public function getCartablePrice();
}
