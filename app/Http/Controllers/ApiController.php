<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
class ApiController extends Controller
{
    public $api;
    public function __construct(){
        $this->api = json_decode(Http::get('https://jsonplaceholder.typicode.com/todos/'));
    }
    public function fetch(){
        $obj = collect($this->api);
        $result = $obj->filter(fn($value, $key)=> $value->userId == 1 && $value->completed == true);
        return $result;
    }
    public function show(){
        $collection = collect($this->api);

    }
}
