<?php

// app/Traits/BaseControllerTrait.php
namespace App\Traits;
use Illuminate\Http\Request;
 
trait BaseControllerTrait
{

    public function __construct(Request $request)
    {
        
        $this->initialize($request);
    }

    protected function initialize(Request $request)
    {
        $data = $request->attributes->get('custom_data');
        
        if(!$data["status"]){

            return ["msg" => $data["msg"]];

        } 
        die(json_encode(["status" => 0,"msg" => "123456844"]));
    }
}