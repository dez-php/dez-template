<?php

namespace Dez\Template\Core;

use Dez\Template\Template;
use Dez\Template\TemplateException;

/**
 * Class File
 * @package Dez\Template\Core
 */
class File {

    /**
     * @var Template
     */
    protected $template;

    /**
     * @var \SplFileInfo
     */
    protected $file;

    /**
     * File constructor.
     * @param $file
     * @param Template $template
     */
    public function __construct($file, Template $template)
    {
        $this->setTemplate($template);
        $this->setFile($file);
    }

    /**
     * @return boolean
     */
    public function exists()
    {
        return $this->file->isFile();
    }

    /**
     * @param $path
     * @return $this
     * @throws TemplateException
     */
    public function setFile($path)
    {
        $realpath = realpath($this->template->getDirectory() . DIRECTORY_SEPARATOR . $path . '.php');

        if( false === $realpath) {
            throw new TemplateException('Template :name not found', [':name' => $path]);
        }

        $this->file = new \SplFileInfo($realpath);

        return $this;
    }

    /**
     * @param Template $template
     * @return $this
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return \SplFileInfo
     */
    public function getFile()
    {
        return $this->file;
    }

}