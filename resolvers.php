<?php

return [
    'Person' => [
        'pet' =>  function($root, $args) {
            error_log(print_r($root, true));
            return [
                "isDog" => true,
                "sound" => "bark",
            ];
        },
    ],
    'Query' => [
        'getPerson' => function($root, $args, $context) {
            return [
                "name" => "bob",
                "pet" => [],
            ];
        }
    ]
];