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
                'country' => 'required|string|min:3|max:12',
                'city' => 'required|string|min:3|max:12',
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

    // Search tournaments - search, filters and sort

    public function listAndSearch(Request $request){

        $tournaments = Tournament::paginate(5);

        if ($request->sortBy === 'name'){

            if ($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('name', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('name', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'start_date'){

            if($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('start_date', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('start_date', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'end_date'){

            if($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('end_date', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('end_date', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'country'){

            if($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('country', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('country', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'city'){

            if($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('city', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('city', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'tournament points'){

            if($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('tournament_points', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('tournament_points', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'number_of_available_seats'){

            if($request->direction === 'desc'){
                $tournaments = Tournament::orderBy('number_of_available_seats', 'desc')->paginate(5);
            }
            else{
                $tournaments = Tournament::orderBy('number_of_available_seats', 'asc')->paginate(5);
            }
        }

        if (request()->ajax()){

            $firstView = view('layouts.elements.tournaments.search.search')->render();
            $secondView = view('dynamic-content.tournaments.list', compact('tournaments'))->render();

            return response()->json([
                'search' => $firstView,
                'list' => $secondView
            ]);
        }
        else{
            return view('tournaments.list', compact('tournaments'));
        }
    }

    public function search(Request $request){

        if(request()->ajax()){

            $tournamentStartDateValue = $request->tournamentStartDateValue;
            $tournamentEndDateValue = $request->tournamentEndDateValue;

            $tournamentMinTournamentPointsValue = $request->tournamentMinTournamentPointsValue;
            $tournamentMaxTournamentPointsValue = $request->tournamentMaxTournamentPointsValue;

            $tournaments = Tournament::where('name', 'like', $request->tournamentNameValue. '%')
                ->where('country', 'like', $request->tournamentCountryValue. '%')
                ->where('city', 'like', $request->tournamentCityValue. '%')
                ->when($tournamentStartDateValue, function ($query) use ($tournamentStartDateValue) {
                    return $query->where('start_date', '>=',
                        date_format(date_create_from_format('d/m/Y', $tournamentStartDateValue), 'Y-m-d'));
                })
                ->when($tournamentEndDateValue, function ($query) use ($tournamentEndDateValue) {
                    return $query->where('end_date', '<=',
                        date_format(date_create_from_format('d/m/Y', $tournamentEndDateValue), 'Y-m-d'));
                })
                ->when($tournamentMinTournamentPointsValue, function ($query) use ($tournamentMinTournamentPointsValue) {
                    return $query->where('tournament_points', '>=', $tournamentMinTournamentPointsValue);
                })
                ->when($tournamentMaxTournamentPointsValue, function ($query) use ($tournamentMaxTournamentPointsValue) {
                    return $query->where('tournament_points', '<=', $tournamentMaxTournamentPointsValue);
                })
                ->paginate(3);

            $view = view('dynamic-content.tournaments.searchable-cards', compact('tournaments'))->render();
            return response()->json($view);

        }
    }
}
