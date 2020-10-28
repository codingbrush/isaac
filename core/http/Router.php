<?php 

namespace Isaac\Core\Http;
use Exception;

class Router{

    /* @var Array */
    private static $routes = [
        'GET'  => [],
        'POST' => [],
    ];

    public static function load(String $routeFile)
    {
        if (file_exists($routeFile)) {
            require $routeFile;
            $router = new static;

        }
        return $router;
    }

    public static function get(String $url, String $controller)
    {
        return self::$routes['GET'][$url] = $controller;
    }

    public static function post(String $url, String $controller)
    {
        return self::$routes['POST'][$url] = $controller;
    }

    public function direct(String $url, String $method)
    {
        $match = false;
        try {

            if (array_key_exists($url, self::$routes[$method])) {
                $this->callControllerAction(...explode('@', self::$routes[$method][$url]));
            } 
             else {
                 foreach (self::$routes[$method] as $key => $val) {

                     $pattern = preg_replace('#\(/\)#', '/?', $key);

                     $pattern = "@^" . preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-\.\@]+)', $pattern) . "$@D";

                     \preg_match($pattern, $url, $matches);

                     array_shift($matches);

                     if ($matches && isset($matches)) {

                         $match     = true;
                         $getAction = explode('@', $val);
                         $this->callControllerAction($getAction[0], $getAction[1], $matches);
                     }

                 }
                 if ($match == false) {
                     throw new \OutOfBoundsException("Url given does not exist");
                 }

             }
        } catch (\OutOfBoundsException $th) {
            // throw $th;
            die(var_dump($th->getMessage()));
        }

    }

    public function callControllerAction(String $controller, String $action, array $vars = [])
    {

        try {
            $controller = "Isaac\\App\\Controllers\\$controller";

            $controllers = new $controller;
            if (!method_exists($controllers, $action)) {
                throw new \Exception("Method $action does not exist in Controller $controller");
            }
            foreach ($vars as $key => $value) {
                if (is_numeric ($key)) {
                    unset($vars[$key]);
                }
            }

            return $controllers->$action($vars);
        } catch (\Exception $e) {
            die(var_dump($e->getMessage()));
            //"Action $action does not exist in Controller $controller";
        }

        // dd($controller);
    }

}