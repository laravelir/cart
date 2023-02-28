<?php

namespace Laravelir\Cart\Contract;

interface DriverContract
{
    public function all();
    public function get($item);
    public function add($data, $options = []);
    public function update($item, $data, $options = []);
    public function has($item);
    public function delete($item);
    public function truncate();
}
