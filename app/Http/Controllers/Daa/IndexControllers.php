<?php

namespace App\Http\Controllers\Daa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexControllers extends Controller
{
   public function index(){
       return view('daa.index');
   }
}
