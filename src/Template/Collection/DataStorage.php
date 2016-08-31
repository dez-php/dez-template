<?php

namespace Dez\Template\Collection;

class DataStorage implements \ArrayAccess, \IteratorAggregate, \Countable, DataStorageInterface
{

    protected $strict = false;

    protected $data = [];

    public function __construct(array $data = [], $strict = false)
    {
        $this->batch($data);
        $this->strict = $strict;
    }

    public function has($key)
    {
        return array_key_exists($key, $this->data);
    }

    public function get($key, $default = null)
    {
        return $this->has($key) ? $this->data[$key] : $default;
    }

    public function batch(array $data)
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }

    public function set($key, $data)
    {
        $this->data[$key] = is_array($data) ? new DataStorage($data, $this->useStrict()) : $data;

        return $this;
    }

    public function add($key, $data)
    {
        if(!$this->has($key)) {
            $this->set($key, $data);
        } else {

        }

        return $this;
    }

    public function remove($key)
    {
        // TODO: Implement remove() method.
    }

    public function map(\Closure $closure, array $context = [])
    {
        // TODO: Implement map() method.
    }

    public function each(\Closure $closure)
    {
        // TODO: Implement each() method.
    }

    public function toObject()
    {
        // TODO: Implement toObject() method.
    }

    public function toArray()
    {
        $arrayData = [];

        foreach ($this as $key => $data) {
            $arrayData[$key] = ($data instanceof DataStorageInterface) ? $data->toArray() : $data;
        }

        return $arrayData;
    }

    public function toJSON()
    {
        return json_encode($this->toArray());
    }

    public function useStrict()
    {
        return $this->strict;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset, ($this->useStrict() ? null : new static([])));
    }

    public function offsetSet($offset, $data)
    {
        $this->set($offset, $data);

        return $this;
    }

    public function offsetUnset($offset)
    {

    }

    public function count()
    {

    }


}