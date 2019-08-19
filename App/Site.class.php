<?php
namespace App;

use App\Net\HTTPRequest;

class Site
{
    private $req;
    function __construct()
    {
        $this->req = new HTTPRequest();
        /*print_r($_SERVER);*/

        Router::addRoute(new Route('GET', '/', 'Home', 'show'));
        Router::addRoute(new Route('GET', '/movies', 'Movie', 'list'));
//        Router::addRoute(new Route('GET', '/movies/{id:\+}', 'Movie', 'detail'));
    }

    function run()
    {
        $route = Router::getRoute($this->req);
        if ($route === null)
        {
            header('HTTP/1.0 404 Not found');
            exit('<h1>404 Page Not Found</h1>');
        }
        $class = 'App\\Controller\\' . $route->getController() . 'Controller';
        $ctrl = new $class();
        $ctrl->{$route->getAction()}();
    }

}
