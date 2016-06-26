<?php
namespace App\Action;

use Endroid\Twitter\Twitter;
use Slim\Http\Request;
use Slim\Http\Response;

class SearchAction
{
    /**
     * @var Twitter
     */
    public $twitterClient;

    public function __construct($twitterClient)
    {
        $this->twitterClient = $twitterClient;
    }

    public function search(Request $request, Response $response, $args = [])
    {
        $requestParams['geocode'] = $request->getParam('geocode');
        $requestParams['count'] = $request->getParam('count', 100);

        $twitterResponse = $this->twitterClient->query('search/tweets', 'GET', 'json', $requestParams);

        $result['request-param'] = $requestParams;
        $result['response'] = json_decode($twitterResponse->getContent());

        return $response->withJson($result);
    }
}
