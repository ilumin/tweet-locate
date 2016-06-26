<?php

use App\Action\PageAction;
use App\Action\SearchAction;
use Guzzle\Http\Client;
use Slim\Container;

$container = $app->getContainer();

$container['apiClient'] = function(Container $c) {
    return new Client();
};

$container['PageAction'] = function(Container $c) {
    return new PageAction();
};

$container['SearchAction'] = function(Container $c) {
    return new SearchAction($c->get('apiClient'));
};
