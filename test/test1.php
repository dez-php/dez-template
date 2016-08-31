<?php

namespace Test1;

use Dez\Template\Collection\DataStorage;

include_once __DIR__ . '/../vendor/autoload.php';

$storage = new DataStorage([
    1, 2, 3
], true);

$storage->set('test', [1, 2, 3]);

$storage['numeric_key'] = [];

$storage['user_data'] = ['email', 'access' => [1, 2, 3, 4, 5, 6]];

$storage[] = 123;

echo "<pre>";

print_r($storage['test']);
print_r($storage);

echo $storage->toJSON();
echo json_encode($storage);

print_r($storage->toArray());
print_r($storage->toObject());

$mapped = $storage->map(function ($data){
    return is_integer($data) ? pow($data, 3) : $data;
}, []);
print_r($mapped[2]);

echo "</pre>";