<?php

use App\Action\PageAction;
use App\Action\SearchAction;
use Endroid\Twitter\Twitter;
use Guzzle\Http\Client;
use Slim\Container;

$container = $app->getContainer();

$container['twitterClient'] = function(Container $c) {
    $twitterConfig = $c->get('twitter');
    return new Twitter(
        $twitterConfig['consumerKey'],
        $twitterConfig['consumerSecret']
    );
};

$container['apiClient'] = function(Container $c) {
    return new Client();
};

$container['PageAction'] = function(Container $c) {
    return new PageAction();
};

$container['SearchAction'] = function(Container $c) {
    return new SearchAction($c->get('twitterClient'));
};
