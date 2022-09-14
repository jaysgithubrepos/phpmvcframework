<?php 

require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteControllers;

$app=new Application(dirname(__DIR__));




$app->router->get('/contact','contact');

$app->router->get('/','home');

$app->router->post('/contacts',[SiteControllers::class,'contact']);





$app->run();

?>