<?php

use App\Action\PageAction;
use Slim\Container;

$container = $app->getContainer();

$container['PageAction'] = function(Container $c) {
    return new PageAction();
};
