<?php
define('ROOTDIR', __DIR__);
require_once ROOTDIR .'/app/inc/urlfunctions.php';

$urlExploded = explode('/', substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1));
// primeiro item do url é o controller
$controller = getController($urlExploded);
$acao = getMethod($urlExploded, $controller);
$params = getParams($urlExploded);
if($controller && $acao){
    $class = new $controller();
    $class->$acao($params);
} else {
    require_once ROOTDIR . '/views/404.php';
}
?>