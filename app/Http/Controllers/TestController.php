<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        $scores = scores::all();
        $level = $this->ShowScore('test');
    }

    public function ShowScore(){
        $level = DB::table('scores')->where('score');
        var_dump($level);

        return view('scoreshow' , [ 'level' => $level ]);
    }
}
