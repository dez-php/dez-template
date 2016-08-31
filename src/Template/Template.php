<?php

namespace Dez\Template;

use Dez\DependencyInjection\Injectable;
use Dez\Template\Collection\DataStorage;

/**
 * Class Template
 * @package Dez\Template
 */
class Template extends Injectable implements TemplateInterface {

    /**
     * @var DataStorage
     */
    protected $data = null;

    /**
     * Template constructor.
     */
    public function __construct($template, array $data = [])
    {
        $this->data = new DataStorage([]);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    public function set($key, $data)
    {

    }

    public function batch(array $data = [])
    {

    }

    public function data()
    {
        return $this->data;
    }

    public function render()
    {
        return __METHOD__;
    }

    public function fetch($template, array $data = [])
    {

    }

    public static function factory($template, array $data = [])
    {

    }


}