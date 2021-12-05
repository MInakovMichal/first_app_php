<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondAppController extends Controller
{
    public function index(){
        return "Hello I am from controller";
    }
}
