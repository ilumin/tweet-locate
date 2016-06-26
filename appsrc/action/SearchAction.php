<?php
namespace App\Action;

use App\Resource\TwitterResource;
use Slim\Http\Request;
use Slim\Http\Response;

class SearchAction
{
    /**
     * @var TwitterResource
     */
    public $twitterResource;

    public function __construct($twitterResource)
    {
        $this->twitterResource = $twitterResource;
    }

    public function search(Request $request, Response $response, $args = [])
    {
        $requestParams['geocode'] = $request->getParam('geocode');
        $requestParams['count'] = $request->getParam('count', 10);

        $searchResult = $this->twitterResource->search($requestParams);
        if (empty($searchResult)) {
            $result['error'] = 'Not found.';
        }
        else {
            $result['status'] = 'success';
            $result['data'] = $searchResult;
        }

        return $response->withJson($result);
    }
}
