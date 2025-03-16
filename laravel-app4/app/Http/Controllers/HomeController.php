<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class HomeController extends CommController
{
    public function __construct(Request $request) {

        $data = $this->initialize($request);
        if(!$data["status"]){
            die(json_encode($data));
        }
    }

    public function index(Request $request)  
    {       
        $user = Auth::user();      

        return view('home',["username"=>$user->name,"redisname" => Redis::get("name")]);   
    }  
}
