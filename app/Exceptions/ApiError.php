<?php

namespace App\Exceptions;

use Exception;

class ApiError extends Exception
{

    public function render($request){
        return "Server Error";
    }
}
