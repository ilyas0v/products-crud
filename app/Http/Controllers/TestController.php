<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function calculate(Request $test)
    {
        $a = $test->a; // $_REQUEST['a']  ve ya  $_GET['a']
        $b = $test->b;

        $c = $a + $b;

        return view('result', compact('a', 'b', 'c'));
    }




    public function abc()
    {
        return view('welcome');
    }
}
