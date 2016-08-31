<?php

namespace Dez\Template\Core;

use Dez\Template\Template;
use Dez\Template\TemplateException;

/**
 * Class Compiler
 * @package Dez\Template\Core
 */
class Compiler {

    /**
     * @var Template|null
     */
    protected $template = null;

    /**
     * @var File|null
     */
    protected $layout = null;

    /**
     * Compiler constructor.
     * @param $path
     * @param Template $template
     */
    public function __construct($path, Template $template)
    {
        $this->layout = new File($path, $template);
        $this->template = $template;
    }

    /**
     * @return null|string
     * @throws \Exception
     */
    public function render()
    {
        $content = null;

        try {
            ob_start();
            extract($this->template->data()->toArray());

            if(! $this->layout->exists()) {
                throw new TemplateException(
                    'Layout file [:file] could not been found',
                    [':file' => $this->layout->getFile()->getFilename()]
                );
            }

            include $this->layout->getFile()->getPathname();
            $content = ob_get_clean();
        } catch (\Exception $e) {
            ob_get_clean();
            throw $e;
        }

        return $content;
    }

    /**
     * @param $path
     * @param array $data
     * @return string
     */
    public function fetch($path, array $data = [])
    {
        return $this->template->fetch($path, $data);
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param Template $template
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }



}