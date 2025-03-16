<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jobs\ProcessPodcast;

class ProfileController extends CommController
{
    public function __construct(Request $request) {

        $data = $this->initialize($request);
        if(!$data["status"]){
            die(json_encode($data));
        }
    }

    public function index(\App\Models\Profile $profile) 
    {
        // 在这里，通过数组 key => value 形式将 $profiles 渲染到模版上
        Redis::set('name', 'Taylor');

        ProcessPodcast::dispatch([
            "act" => "profile",
            "id" => 2,
            "price" => 100
        ]);

        return view('profile.index',[
            'profiles' => $profile->all() 
        ]);
    } 

    public function detail($id, \App\Models\Profile $profile)
    {
        $redis_name = Redis::get("name");

        ProcessPodcast::dispatch([
            "act" => "user",
            "id" => 10,
            "price" => 100
        ]);
        // 这里我们通过 id 来查找对应的用户信息
        return view('profile.detail',[
            'profile' => $profile->find($id),
            'redisname' => $redis_name
        ]);
    }
}
