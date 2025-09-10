<?php

$callbacks = [
    [
        'hook' => \core\hook\di_configuration::class,
        'callback' => \local_stringreplacer\hook_listener::class . '::inject_dependencies',
    ],
];
