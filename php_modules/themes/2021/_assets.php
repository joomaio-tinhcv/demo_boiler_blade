<?php defined( 'APP_PATH' ) or die('');

// use SPT\Router ;

return [
    'plugin-css' => [
        ['__domain__/assets/css/gutenberg.css', '', 'media-gutenberg-css'],
        ['__domain__/assets/css/all.min.css', '', 'media-all-css'],
        ['__domain__/assets/css/blocks.css', '', 'media-blocks-css'],
    ],
    'dumploader' => [
        ['__domain__/assets/js/jquery-3.6.0.min.js', [], 'jquery-3.6.0', ''],
        ['__domain__/assets/js/jquery.dm-uploader.min.js' ,  'jquery-3.6.0', 'dm-uploader'],
        ['__domain__/assets/css/jquery.dm-uploader.min.css', '', 'dm-uploader', ''],
    ],
    'bootstrap-css' => [
        ['__domain__/assets/css/bootstrap5.min.css', '' , 'bootstrap-css'],
    ],
    'select2-css' => [
        ['__domain__/assets/css/select2.min.css', '', 'select2-css'],
        ['__domain__/assets/css/select2_custom.css', '', 'select2-custom-css'],
    ],
    'select2-js' => [
        ['__domain__/assets/js/select2.full.min.js', '', 'media-select2-js' , ''],
    ],
    'main-js' => [
        ['__domain__/assets/js/main.js', '', 'media-main'],
    ],
    'jquery' => [
        ['__domain__/assets/js/jquery-3.6.0.min.js', [], 'jquery-3.6.0.min', 'top']
    ],
    'js-bootstrap' => [
        ['__domain__/assets/js/bootstrap.bundle.min.js', [], 'bootstrap', '']
    ],

    'css-adminlte' => [
        ['__domain__/assets/css/adminlte.css', '', 'media-adminlte-css'],
        ['__domain__/assets/css/adminlte.min.css', [], 'style']
    ],

    'css-fontawesome' => [
        ['__domain__/assets/font/font-awesome-4.7.0/css/font-awesome.min.css',[], 'fontawsome-style'],
        ['__domain__/assets/font/fontawesome/css/fontawesome.min.css',[], 'fontawsome-free-style'],
        ['__domain__/assets/font/fontawesome/css/all.css',[], 'fontawsome-free-all-style'],
    ],
];