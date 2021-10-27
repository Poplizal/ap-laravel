<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class homeController extends Controller
{
  public function home(){
        $data=posts::all();
        return view('home',compact('data'));
    }
}
