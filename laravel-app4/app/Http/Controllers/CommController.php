<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommController extends Controller
{
    protected function initialize(Request $request)
    {
        $data = $request->attributes->get('custom_data');
        
        return $data;
    }

   
}
