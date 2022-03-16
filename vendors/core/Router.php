<?php

class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        //echo $url;
        foreach (self::$routes as $regexp => $route) {

            if (preg_match("#$regexp#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }

                }

                if (!isset($route["action"])) {
                    $route["action"] = "index";
                }

                self::$route = $route;
                debug(self::$route);

                return true;
            }
        }

        return false;
    }

    /**
     * перенапрявляет URL по корректному маршруту
     * @param string $url входящий URL
     * @return void
     */
    public static function dispatch(string $url)


    {
        if (self::matchRoute($url)) {
            $controller = self::$route["controller"];

            if (class_exists($controller)) {
                echo "OK";
            } else {
                echo "Контроллер <b>$controller</b> не найден";
            }
        } else {
            http_response_code(404);
            include "404.html";
        }
    }
}