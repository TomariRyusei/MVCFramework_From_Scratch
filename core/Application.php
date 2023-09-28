<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $requset;
    public Response $response;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->requset = new Request();
        $this->response = new Response();
        $this->router = new Router($this->requset, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    } 
}