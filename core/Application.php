<?php
namespace app\core;
class Application{

    public static  $ROOT_DIR;
    public $router;
    public $request;
    public $response;
    public static $app;
    public function __construct($rootPath)
    {   self::$ROOT_DIR = $rootPath;
        self::$app =$this;
        $this->request=new Request();
        $this->response=new Response();
        $this->router=new Router($this->request,$this->response);
    }
    public function run(){
        echo $this->router->resolve();
    }



}

?>