<?php

namespace Laravelir\Cart\Contract;

interface DriverContract
{
    public function all();
    public function get();
    public function store();
    public function update();
    public function has();
    public function delete();
    public function truncate();
}
