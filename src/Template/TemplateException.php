<?php

namespace Dez\Template;

use Exception;

/**
 * Class TemplateException
 * @package Dez\Template
 */
class TemplateException extends \Exception
{
    /**
     * TemplateException constructor.
     * @param string $message
     * @param array $replacements
     * @param integer $code
     * @param Exception $previous
     */
    public function __construct($message, array $replacements = [], $code = 0, Exception $previous = null)
    {
        $message = str_replace(array_keys($replacements), array_values($replacements), $message);
        parent::__construct($message, $code, $previous);
    }

}