<?php
namespace App;

use App\Net\HTTPRequest;

class Router {
    private static $routes = [];

    public static function addRoute(Route $route) {
        self::$routes[] = $route;
    }

    public static function getRoute(HTTPRequest $req) {
        foreach (self::$routes as $route) {
            if ($route->match($req)) {
                return $route;
            }
        }
        return null;
    }
}

class Route {
    private $method;
    private $uri;
    private $controller;
    private $action;
    private $pattern;

    public function __construct(string $m, string $u, string $c, string $a) {
        $this->method = $m;
        $this->uri = $u;
        $this->controller = $c;
        $this->action = $a;
        $this->pattern = preg_replace('@/\{(\w+):([\[\]\w\+\*\\\]*)\}/?@', '/(?<$1>$2)/?', $this->uri);
    }

    public function match(HTTPRequest $req):bool {
        if ($this->method !== $req->getMethod())
        {
            return false;
        }
        if ($this->uri === $req->getUri())
        {
            /*return $req->getUri() === $this->uri;*/
            return true;
        }
        if (!empty($this->pattern))
        {
            preg_match('@^'.$this->pattern.'$@', $req->getUri(), $match);
            if (count($match) > 0) {
                foreach ($match as $key => $value) {
                    if (is_string($key)) {
                        $_GET[$key] = $value;
                    }
                }
                return true;
            }
        }
        return false;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

}
