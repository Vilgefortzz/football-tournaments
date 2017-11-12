<?php

namespace App\Http\Controllers;

use App\Tournament;
use Auth;
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

    public function create(){

        if (request()->ajax()){

            $view = view('dynamic-content.tournaments.create')->render();
            return response()->json($view);
        }
        else{
            return view('tournaments.create');
        }
    }
}
