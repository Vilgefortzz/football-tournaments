<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
   public function menu(){
       return view('clubs.menu');
   }
}
