<?php

namespace Dez\Template\Core;

use Dez\Template\TemplateException;

/**
 * Class Directory
 * @package Dez\Template\Core
 */
class Directory
{

    /**
     * @var string
     */
    protected $path;

    /**
     * Directory constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->setPath($path);
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return $this
     * @throws TemplateException
     */
    public function setPath($path)
    {
        if (!is_dir($path)) {
            throw new TemplateException('Directory path [:path] not valid', ['path' => $path]);
        }

        $this->path = $path;

        return $this;
    }


}