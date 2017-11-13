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

    public function store(Request $request){

        if ($request->has('name') && $request->has('start_date') && $request->has('end_date') &&
            $request->has('country') && $request->has('city') && $request->has('tournament_points') &&
            $request->has('number_of_seats') && $request->has('game_system')){

            $this->validate($request, [
                'name' => 'required|string|min:5|max:40',
                'tournament_points' => 'required|integer|min:20|max:2000'
            ]);

            $tournament = new Tournament;
            $tournament->name = $request->name;

            $tournament->start_date = date_format(date_create_from_format('d/m/Y', $request->start_date), 'Y-m-d');
            $tournament->end_date = date_format(date_create_from_format('d/m/Y', $request->end_date), 'Y-m-d');
            $tournament->country = $request->country;
            $tournament->city = $request->city;
            $tournament->tournament_points = $request->tournament_points;
            $tournament->number_of_seats = $request->number_of_seats;
            $tournament->number_of_available_seats = $tournament->number_of_seats;
            $tournament->game_system = $request->game_system;

            if ($request->has('prize_first_place')){
                $tournament->prize_first_place = $request->prize_first_place;
            }

            if ($request->has('prize_second_place')){
                $tournament->prize_second_place = $request->prize_second_place;
            }

            if ($request->has('prize_third_place')){
                $tournament->prize_third_place = $request->prize_third_place;
            }

            $tournament->user_id = Auth::user()->id;
            $tournament->save();

            flashy()->success('Tournament was successfully created !');
            return redirect()->to(route('home'));
        }

        flashy()->error('Tournament cannot be created. Fill out all missing required fields');
        return redirect()->back();
    }
}
