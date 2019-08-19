<?php

namespace App\Net;

use App\Route;

class HTTPRequest{
    private $method;
    private $uri;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->uri = $_SERVER['REQUEST_URI'];
    }


    public function getMethod() : string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

}
