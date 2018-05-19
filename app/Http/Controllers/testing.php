<?php

namespace App\Http\Controllers;
use App\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class testing extends Controller
{
    public function index()
    {
       $obj=new test();
       $obj->ind();
    }
}
