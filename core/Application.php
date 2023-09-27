<?php

namespace app\core;

class Application
{
    public Router $router;
    public Request $requset;
    public function __construct()
    {
        $this->requset = new Request();
        $this->router = new Router($this->requset);
    }

    public function run()
    {
        $this->router->resolve();
    }
}