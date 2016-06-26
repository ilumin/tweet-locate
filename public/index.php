<?php
require VENDOR . '/autoload.php';
require '../bootstrap/constants.php';

$app = new \Slim\App( require BOOTSTRAP . '/settings.php' );
require BOOTSTRAP . '/dependencies.php';
require BOOTSTRAP . '/routes.php';

$app->run();
