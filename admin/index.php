<?php

require 'kirby/bootstrap.php';

$kirby = new Kirby([
    'roots' => [
        'content' => __DIR__ . '../content'
    ]
]);

echo $kirby->render();
