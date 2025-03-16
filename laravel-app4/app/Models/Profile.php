<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Profile extends Model
{
    // 当然也可以显性设置表名
    protected $table = 'profiles';

    use HasFactory;

    public function testCron(){
        file_put_contents("test.log",date("Y-m-d H:i:s")." hehe ok ...".PHP_EOL,8);
    }

    public function dispatchs($data){
        file_put_contents(public_path()."/test0.log",print_r(["start",$data],true).PHP_EOL,8);
        if($data["act"] == "profile"){
            $res = $this->find($data["id"]);
            file_put_contents(public_path()."/test0.log",print_r(["profile",$res],true).PHP_EOL,8);
        }elseif($data["act"] == "user"){
            $res = User::all();
            file_put_contents(public_path()."/test0.log",print_r(["user223344",$res],true).PHP_EOL,8);
        }
    }
}
