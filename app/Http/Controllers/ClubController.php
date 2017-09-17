<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
   public function menu(){

       if (request()->ajax()){

           $view = view('dynamic-content.clubs.menu')->render();
           return response()->json($view);
       }
       else{
           return view('clubs.menu');
       }
   }
}
