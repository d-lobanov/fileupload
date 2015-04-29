<?php

class RouteException extends Exception{
    public $statusCode;

    public function __construct($status, $message = "", $code = 0){
        $this->statusCode = $status;
        parent::__construct($message, $code);
    }
}

/**
 * Class Route класс для роутинга
 */
class Route
{

    const CONTROLLER_DEFAULT = 'get';
    const ACTION_DEFAULT = 'index';
    const CONTROLLER_LOGIN = 'login';

    /**
     * Запускаем роутинг
     * @return bool
     * @throws RouteException
     */
    static function run()
    {
        $controller = self::CONTROLLER_DEFAULT;
        $action = self::ACTION_DEFAULT;

        $query = explode('/', $_SERVER['REQUEST_URI']);
        $routes = explode('?', $query[2]);

        if (!empty($routes[0])) {
            $controller = $routes[0];
        }

        if (!empty($routes[1])) {
            $action = $routes[1];
        }

        $controller = ucfirst($controller);
        $className = $controller. "Controller";
        $actionName = "action". ucfirst($action);


        if(class_exists($className)){
            $actionClass = new $className;
            $actionClass->beforeAction();

            if(method_exists($actionClass, $actionName)){
                $actionClass->$actionName();
                return true;
            }
        }

        throw new RouteException(404);
    }

    /**
     * Перенаправляем на controller
     * @param $controller
     */
    static function redirect($controller){
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/$controller");
    }
}
