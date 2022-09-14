<?php
namespace app\core;
class Response{

public function statusResponsecode($code)
{

    http_response_code($code);



}

}


?>