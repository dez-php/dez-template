<?php

namespace Dez\Template\Extensions;

use Dez\Template\Core\ExtensionInterface;
use Dez\Template\Template;

/**
 * Class ExtensionCase
 * @package Dez\Template\Extensions
 */
class ExtensionCase implements ExtensionInterface {

    /**
     * @param Template $template
     */
    public function register(Template $template)
    {
        $template->registerFunction('case', [$this, 'upper']);
        $template->registerFunction('upper', [$this, 'upper']);
        $template->registerFunction('lower', [$this, 'lower']);
    }

    /**
     * @param $string
     * @return string
     */
    public function upper($string)
    {
        return strtoupper($string);
    }

    /**
     * @param $string
     * @return string
     */
    public function lower($string)
    {
        return strtolower($string);
    }

}