<?php
if (version_compare(PHP_VERSION, '5.6.0', '<')) die('require PHP > 5.6.0 !');

define('APP_ROOT', dirname(__DIR__));
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, -10));

//时区
date_default_timezone_set('Asia/Shanghai');


require APP_ROOT . '/../vendor/autoload.php';

//路由
$router = new AltoRouter();

// map 主页
$router->map( 'GET', '/', function() {
    require APP_ROOT . '/views/home.php';
});

// map user details page
//$router->map( 'GET', '/user/[i:id]/', function( $id ) {
//    echo 1111;
//    require APP_ROOT . 'views/user-details.php';
//});



$router->map( 'GET', '/users/[i:id]/', 'UserController#showDetails' );

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    list($controllerName, $actionName) = explode('#',$match['target']);
    
//    $controllePath = APP_ROOT.'/controllers/'.$controllerName.'.php';
//    include $controllePath;

    $controllerClass = '\app\controllers\\'.$controllerName;
    $controller = new $controllerClass;

    if(method_exists($controller, $actionName)){
        $controller->$actionName();
    }else{
        echo "404 Not Found";
    }
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

// load map routes
//require APP_ROOT . '/config/routes.php';
