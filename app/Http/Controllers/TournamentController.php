<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function menu(){

        if (request()->ajax()){

            $view = view('dynamic-content.tournaments.menu')->render();
            return response()->json($view);
        }
        else{
            return view('tournaments.menu');
        }
    }
}
