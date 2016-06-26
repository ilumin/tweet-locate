<?php
namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class PageAction
{
    /**
     * @var Twig
     */
    public $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function main(Request $request, Response $response, $args = []) {
        return $this->view->render($response, 'main.twig');
    }
}
