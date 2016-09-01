<?php

namespace Test2;

use Dez\Template\Template;

include_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

try {
    $template = new Template(__DIR__ . '/tmpl');
    $template->addDirectory('shop', __DIR__ . '/another_dir');

    $template->set('test', md5(time()));

    $content = $template->render('index');

    die($content);

} catch (\Exception $e) {
    die(var_dump(get_class($e), $e->getMessage()));
}