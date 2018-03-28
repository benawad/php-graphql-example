<?php

require_once 'vendor/autoload.php';

use Siler\Graphql;
use Siler\Http\Request;
use Siler\Http\Response;

require 'vendor/autoload.php';

Response\header('Access-Control-Allow-Origin', '*');
Response\header('Access-Control-Allow-Headers', 'content-type');

$context = [
    'mysqli' => 5
];

if (Request\method_is('post')) {
    $schema = include __DIR__.'/schema.php';

    Graphql\init($schema, null);
}