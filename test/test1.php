<?php

namespace Test1;

use Dez\Template\Collection\DataStorage;

include_once __DIR__ . '/../vendor/autoload.php';

$storage = new DataStorage([
    1, 2, 3
], true);

$storage->set('test', [1, 2, 3]);

$storage['user_data'] = ['email', 'access' => [1, 2, 3, 4, 5, 6]];

echo "<pre>";
print_r($storage['test']);
print_r($storage);
echo "</pre>";