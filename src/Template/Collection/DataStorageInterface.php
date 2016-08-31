<?php

namespace Dez\Template\Collection;

interface DataStorageInterface
{

    public function has($key);

    public function get($key, $default = null);

    public function all(array $keys = []);

    public function batch(array $data);

    public function set($key, $data);

    public function add($key, $data);

    public function remove($key);

    public function map(\Closure $closure, array $context = []);

    public function each(\Closure $closure);

    public function sort(\Closure $closure);

    public function exists();

    public function clear();

    public function toObject();

    public function toArray();

    public function toJSON();

}