<?php
namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

class PageAction
{
    public function main(Request $request, Response $response, $args = []) {
        $data[] = 'Yike!';
        return $response->withJson($data);
    }
}
