<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $requset;
    public Response $response;
    public Controller $controller;
    public Session $session;
    public Database $db;
    public static Application $app;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->requset = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->db = new Database($config['db']);
        $this->router = new Router($this->requset, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    } 

    public function getController()
    {
        return $this->controller;
    } 

    public function setController(Controller $controller)
    {
        $this->controller = $controller;    
    } 
}