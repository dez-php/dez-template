<?php

namespace Dez\Template;

interface TemplateInterface {

    public function set($key, $data);

    public function batch(array $data = []);

    public function data();

    public function render();

    public function fetch($template, array $data = []);

    public static function factory($template, array $data = []);

}