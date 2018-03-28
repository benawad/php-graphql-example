<?php

return [
    'Person' => [
        'pets' =>  function($root, $args, $context) {
            $p = $context['petLoader']->load($root['id']);
            error_log(print_r($p, true));
            $p->then(function($data) {
                error_log("data");
                error_log(print_r($data, true));
            });
            return $p;
        },
    ],
    'Query' => [
        'getPeople' => function($root, $args, $context) {
            return $context['sql']("SELECT name, id FROM people");
        }
    ]
];