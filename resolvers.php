<?php

use Overblog\DataLoader\DataLoader;

return [
    'Person' => [
        'pet' =>  function($root, $args, $context) {
            return DataLoader::await($context['petLoader']->load($root['id']));
        },
    ],
    'Query' => [
        'getPeople' => function($root, $args, $context) {
            return $context['sql']("SELECT name, id FROM people");
        }
    ]
];