<?php

namespace app\core;

class Router
{
    public Request $requset;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->requset = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->requset->getPath();
        $method = $this->requset->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            echo "Not Found";
            exit;
        }

        echo call_user_func($callback);

        // echo '<pre>';
        // var_dump($callback);
        // echo '</pre>';
        // exit;
    }
}