<?php

namespace Dez\Template;

use Dez\Template\Core\Collection\DataStorage;
use Dez\Template\Core\Compiler;
use Dez\Template\Core\Directory;

/**
 * Class Template
 * @package Dez\Template
 */
class Template {

    /**
     * @var DataStorage
     */
    protected $data = null;

    /**
     * @var Directory
     */
    protected $directory = null;

    /**
     * @var DataStorage|Directory[]
     */
    protected $directories = null;

    /**
     * @var null
     */
    protected $layout = null;

    /**
     * Template constructor.
     * @param string $directory
     * @param array $data
     */
    public function __construct($directory, array $data = [])
    {
        $this->data = new DataStorage($data);
        $this->directories = new DataStorage();
        $this->directory = new Directory($directory);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return static::class;
    }

    /**
     * @param $key
     * @param $data
     * @return $this
     */
    public function set($key, $data)
    {
        $this->data->set($key, $data);

       return $this;
    }

    /**
     * @param array $data
     */
    public function batch(array $data = [])
    {
        $this->data->batch($data);
    }

    /**
     * @return DataStorage
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * @param string $path
     * @return string
     */
    public function render($path)
    {
        return $this->compiler($path)->render();
    }

    /**
     * @param string $path
     * @param array $data
     * @return string
     */
    public function fetch($path, array $data = [])
    {
        $this->data->batch($data);

        return $this->render($path);
    }

    /**
     * @param $directory
     * @param array $data
     * @return static
     */
    public static function factory($directory, array $data = [])
    {
        return new static($directory, $data);
    }

    /**
     * @param $path
     * @return Compiler
     */
    protected function compiler($path)
    {
        return new Compiler($path, $this);
    }

    /**
     * @param $name
     * @param $directory
     * @return $this
     */
    public function addDirectory($name, $directory)
    {
        $this->directories->set($name, new Directory($directory));

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory->getPath();
    }


}