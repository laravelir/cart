<?php

namespace Laravelir\Cart\Contract;

interface DriverContract
{
    public function all();
    public function get($id);
    public function add();
    public function update($id);
    public function has($id);
    public function delete($id);
    public function truncate();
}
