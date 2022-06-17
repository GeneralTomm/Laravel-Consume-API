<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
class ApiController extends Controller
{
    public $api;
   
    public function __construct(){
        try{
            $this->api = $this->reach();
        }catch(ApiError $e){
            return $e;
        }

    }
    public function reach()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/');
        throw_if($response->serverError() || $response->clientError(),new ApiError('Server error') );
        return json_decode($response);
    }
    public function fetch(){
        $obj = collect($this->api);
        $result = $obj->filter(fn($value, $key)=> $value->userId == 1 && $value->completed == true);
        return $result;
    }
    public function show($id){
        $collection = collect($this->api);
        return $collection->firstOrFail('id',$id);
    }
    public function search($key){
        $collection = collect($this->api);
        return $collection->filter(fn ($value, $key) => str_contains($value->title, $key));

    }
}
