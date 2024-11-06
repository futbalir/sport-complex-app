<?
session_start();
spl_autoload_register(function ($name){
    require_once __DIR__ .'/src/' . str_replace('\\', '/', $name). '.php';
});
$flag = false;
$rout = $_GET['q']??'';
$router = require __DIR__.'/src/router/router.php';

foreach($router as $pattern=>$value){
    preg_match($pattern, $rout, $match);
    if(!empty($match)){
        $flag = true;
        break;
    }
}
    if(!$flag){
        echo("Not found");
        return;
    }
array_shift($match);
$controllerName = $value[0];
$controllerMethod = $value[1];

$action = new $controllerName;
$action->$controllerMethod(...$match);