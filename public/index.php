<?php
// TODO move to development environment
// Display error on development environment
error_reporting(E_ALL);
ini_set('display_errors', 'on');
// Disable opcache on development environment
ini_set('opcache.enable', '0');

require '../bootstrap/constants.php';
require VENDOR . '/autoload.php';

$app = new \Slim\App( require BOOTSTRAP . '/settings.php' );
require BOOTSTRAP . '/dependencies.php';
require BOOTSTRAP . '/routes.php';

$app->run();
