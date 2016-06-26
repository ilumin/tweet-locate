<?php
namespace App\Action;

use Guzzle\Http\Client;
use Slim\Http\Request;
use Slim\Http\Response;

class SearchAction
{
    /**
     * @var Client
     */
    public $apiClient;

    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function search(Request $request, Response $response, $args = [])
    {
        $requestParam = $request->getParam('geocode');

        $result['request-param'] = $requestParam;

        return $response->withJson($result);
    }
}
