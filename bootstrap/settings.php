<?php
// TODO move to development environment
// Display error on development environment
error_reporting(E_ALL);
ini_set('display_errors', 'on');
// Disable opcache on development environment
ini_set('opcache.enable', '0');

// TODO separate config into environment
return [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
