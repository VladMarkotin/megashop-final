<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 19.05.2018
 * Time: 7:58
 */
namespace Core\Router\web_routes;


//use exceptions\ExceptionClass as Ex;*/

/**
 * Class web_routes
 * @package web_routes
 */
class web_routes
{
    /**
     * @var array
     */
    private static $routes = [
        '' => array(
            'route' => '/',
            'file' => 'app/controllers/indexController.php',
            'class' => 'App\Controllers\IndexController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => 'index.html',
        ),
        "404" => array (
            'route' => '/',
            'file' => 'core/exceptions/ExceptionClass.php',
            'class' => 'Core\Exception\ExceptionClass',
            'function' => 'error',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => '404.html',
        ),
        "test" => array (
            'route' => '/',
            'file' => 'app/controllers/TestController.php',
            'class' => 'App\Controllers\TestController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => '404.html',
        ),
        "add" => array (
            'route' => '/add',
            'file' => 'app/controllers/AddController.php',
            'class' => 'App\Controllers\AddController',
            'function' => 'index',
            'method' => 'get',
            'middleware' => 'anyone',
        ),
        "edit" => array (
            'route' => '/edit',
            'file' => 'app/controllers/EditController.php',
            'class' => 'App\Controllers\EditController',
            'function' => 'index',
            'method' => 'post',
            'middleware' => 'anyone',
        ),
        "delete" => array (
            'route' => '/delete',
            'file' => 'app/controllers/DeleteController.php',
            'class' => 'App\Controllers\DeleteController',
            'function' => 'index',
            'method' => 'post',
            'middleware' => 'anyone',
        ),
    ];

    public static function FindRoute($route){
        try {
            foreach (self::$routes as $k => $v){
                if ($k == $route[1]){
                    return $v;
                }
            }
			
			return self::$routes["404"];
        } catch (Exception $e){
            throw new Exception("Указанный путь не найден!");
        }

        return 0;
    }
} 