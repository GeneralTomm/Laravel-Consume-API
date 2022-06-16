<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller
{
    public function fetch(){
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/');
        $json = json_decode($response);
        return $json;
    }

}
