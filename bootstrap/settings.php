<?php

// TODO separate config into environment
return [
    'settings' => [
        'displayErrorDetails' => true,
    ],
    'twitter' => require CONFIG . '/twitter-auth.php',
    'gmap' => require CONFIG . '/gmap.php',
];
