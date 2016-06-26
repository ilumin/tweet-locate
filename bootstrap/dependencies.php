<?php

use App\Action\PageAction;
use App\Action\SearchAction;
use App\Resource\TwitterResource;
use Endroid\Twitter\Twitter;
use Guzzle\Http\Client;
use Slim\Container;

$container = $app->getContainer();

$container['apiClient'] = function(Container $c) {
    return new Client();
};

$container['PageAction'] = function(Container $c) {
    return new PageAction();
};

$container['TwitterResource'] = function(Container $c) {
    $twitterConfig = $c->get('twitter');
    $twitterClient = new Twitter(
        $twitterConfig['consumerKey'],
        $twitterConfig['consumerSecret']
    );
    return new TwitterResource($twitterClient);
};

$container['SearchAction'] = function(Container $c) {
    return new SearchAction($c->get('TwitterResource'));
};
