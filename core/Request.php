<?php
namespace app\core;

class Request{
    public function getpath(){

        $path=$_SERVER["REQUEST_URI"] ?? '/';
        $position = strpos($path,'?');
         if($position ===false){
            return $path;
            }
        $path=substr($path,0,$position);


       

    }
    public function getmethod(){

        return strtolower($_SERVER['REQUEST_METHOD']);
        

    }



}

?>