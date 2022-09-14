<?php 
namespace app\core;
class Router{
    public $request;
    public $response;

    protected  $routes =[];
    public function __construct(\app\core\Request $request,\app\core\Response $response){
        $this->request=$request;

        $this->response=$response;
    }

    public function get($path,$callback){

        $this->routes['get'][$path]=$callback;

    }

    public function post($path,$callback){

        $this->routes['post['][$path]=$callback;

    }

    public function resolve(){
      $path =  $this->request->getpath();
     $method= $this->request->getmethod(); 
    //  echo "<pre>";
    //  echo var_dump($this->routes);
    //  echo "</pre>";

     $callback = $this->routes[$method][$path] ?? false;
    if($callback === false){
         $this->response->statusResponsecode(404); 
       return $this->renderContent("404page");
    }
    if(is_string($callback)){
        return $this->renderView($callback);
    }
    return call_user_func($callback,);  
    }
    public function renderView($view){

        $layoutcontent=$this->layoutContent();
        $renderonlyview=$this->renderOnlyView($view);
        return str_replace('{{content}}',$renderonlyview,$layoutcontent);
       

    }
    public function renderContent($renderonlyview){

        $layoutcontent=$this->layoutContent();
        return str_replace('{{content}}',$renderonlyview,$layoutcontent);
       

    }
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layout/main.php" ; 
       return ob_get_clean();
    }
    protected function renderOnlyView($view)
    {

        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php" ; 
       return ob_get_clean();
    }
   


}

?>