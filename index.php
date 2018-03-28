<?php

require_once 'vendor/autoload.php';

use Siler\Graphql;
use Siler\Http\Request;
use Siler\Http\Response;

require 'vendor/autoload.php';

// Enable CORS
Response\header('Access-Control-Allow-Origin', '*');
Response\header('Access-Control-Allow-Headers', 'content-type');

// Respond only for POST requests
if (Request\method_is('post')) {
    // Retrive the Schema
    $schema = include __DIR__.'/schema.php';

    // Give it to siler
    Graphql\init($schema);
}