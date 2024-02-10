<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function greeting()
    {
        $name = "Abdel bar";
        $age =  24;

        return view('instagram', ['name'=>$name, 'age'=>$age]);
    }

    public function FacebookGreeting()
    {
        return view('facebook');
    }
}
