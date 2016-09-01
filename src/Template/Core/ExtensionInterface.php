<?php

namespace Dez\Template\Core;

use Dez\Template\Template;

interface ExtensionInterface {

    public function register(Template $template);

}