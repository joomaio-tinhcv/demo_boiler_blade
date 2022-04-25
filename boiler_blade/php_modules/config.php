<?php  defined('APP_PATH') or die('Invalid config');

return [ 
    'sitepath' => '',
    'plugins' => ['users'],
    'theme' => '2021',
    'secrect' => 'sid',
    'endpoints' => [
        '' => 'users.user.gate'
    ],
    'defaultEndpoint' => [
        'fnc' => [
            'get' => 'users.user.gate',
        ],
        'parameters' => ['id'],
    ],
    'db' => [
        'host' => '192.168.56.10',
        'username' => 'root',
        'passwd' => '123123',
        'database' => 'users',
        'prefix' => 'tbl_',
        'debug' => true
    ],
    'redirect' => [
        'notBackend' => 'admin/login',
        'notBackendGroup' => 'admin/login',
    ]
];