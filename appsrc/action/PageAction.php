<?php
namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class PageAction
{
    /** @var Twig */
    public $view;

    /** @var array */
    public $config;

    public function __construct($view, $config)
    {
        $this->view = $view;
        $this->config = $config;
    }

    public function main(Request $request, Response $response, $args = []) {
        return $this->view->render($response, 'main.twig', $this->config);
    }
}
