<?php

namespace App\Http\Controllers;

use App\Club;
use App\RequestToJoinTheClub;
use App\Role;
use Auth;
use File;
use Illuminate\Http\Request;
use Image;

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

    public function create(){

        if (request()->ajax()){

            $view = view('dynamic-content.clubs.create')->render();
            return response()->json($view);
        }
        else{
            return view('clubs.create');
        }
    }

    public function store(Request $request){

        $user = Auth::user();

        if ($request->has('club_name')){

            $this->validate($request, [
                'club_name' => 'required|string|min:3|max:20|unique:clubs',
            ]);

            $club = new Club;
            $club->name = $request->club_name;
            $club->founded_by = $user->username;

            if ($request->hasFile('club_emblem')){

                $emblem = $request->file('club_emblem');

                $directoryName = 'uploads/clubs/emblems/'. $club->name. '/';
                $fileName = $club->name. '_emblem.'. $emblem->getClientOriginalExtension();

                if(!File::exists(public_path($directoryName))) {
                    File::makeDirectory(public_path($directoryName));
                }
                else{
                    File::deleteDirectory(public_path($directoryName), true);
                }

                Image::make($emblem)->resize(150, 150)->save(public_path($directoryName. $fileName));

                $club->emblem_dir = $directoryName;
                $club->emblem = $fileName;
            }

            $club->save();

            $user->club_id = $club->id;
            $user->role_id = Role::ClubPresident;
            $user->save();

            flashy()->success('Club was successfully created. You are club president now !!');
            return redirect()->to(route('home'));
        }

        flashy()->error('Club cannot be created. Error occurs');
        return redirect()->back();
    }

    public function join(Club $club){

        if (request()->ajax()){

            $authUserId = Auth::user()->id;

            $requestToJoinTheClub = new RequestToJoinTheClub;
            $requestToJoinTheClub->club_id = $club->id;
            $requestToJoinTheClub->user_id = $authUserId;
            $requestToJoinTheClub->save();
        }
    }

    // Search clubs - search, filters and sort

    public function listAndSearch(Request $request){

        $clubs = Club::paginate(5);

        if ($request->sortBy === 'name'){

            if ($request->direction === 'desc'){
                $clubs = Club::orderBy('name', 'desc')->paginate(5);
            }
            else{
                $clubs = Club::orderBy('name', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'country'){

            if($request->direction === 'desc'){
                $clubs = Club::orderBy('country', 'desc')->paginate(5);
            }
            else{
                $clubs = Club::orderBy('country', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'city'){

            if($request->direction === 'desc'){
                $clubs = Club::orderBy('city', 'desc')->paginate(5);
            }
            else{
                $clubs = Club::orderBy('city', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'tournament points'){

            if($request->direction === 'desc'){
                $clubs = Club::orderBy('tournament_points', 'desc')->paginate(5);
            }
            else{
                $clubs = Club::orderBy('tournament_points', 'asc')->paginate(5);
            }
        }
        elseif ($request->sortBy === 'trophies'){

            if($request->direction === 'desc'){
                $clubs = Club::orderBy('won_trophies', 'desc')->paginate(5);
            }
            else{
                $clubs = Club::orderBy('won_trophies', 'asc')->paginate(5);
            }
        }

        if (request()->ajax()){

            $firstView = view('layouts.elements.clubs.search.search')->render();
            $secondView = view('dynamic-content.clubs.list', compact('clubs'))->render();

            return response()->json([
                'search' => $firstView,
                'list' => $secondView
            ]);
        }
        else{
            return view('clubs.list', compact('clubs'));
        }
    }

    public function search(Request $request){

        if(request()->ajax()){

            if($request->has('clubMinTournamentPointsValue') && $request->has('clubMaxTournamentPointsValue')){

                $clubs = Club::where('name', 'like', $request->clubNameValue. '%')
                    ->where('country', 'like', $request->clubCountryValue. '%')
                    ->where('city', 'like', $request->clubCityValue. '%')
                    ->where('tournament_points', '>=', $request->clubMinTournamentPointsValue)
                    ->where('tournament_points', '<=', $request->clubMaxTournamentPointsValue)
                    ->paginate(3);

                $view = view('dynamic-content.clubs.searchable-cards', compact('clubs'))->render();
                return response()->json($view);
            }
            elseif ($request->has('clubMinTournamentPointsValue')){

                $clubs = Club::where('name', 'like', $request->clubNameValue. '%')
                    ->where('country', 'like', $request->clubCountryValue. '%')
                    ->where('city', 'like', $request->clubCityValue. '%')
                    ->where('tournament_points', '>=', $request->clubMinTournamentPointsValue)
                    ->paginate(3);

                $view = view('dynamic-content.clubs.searchable-cards', compact('clubs'))->render();
                return response()->json($view);
            }
            elseif ($request->has('clubMaxTournamentPointsValue')){

                $clubs = Club::where('name', 'like', $request->clubNameValue. '%')
                    ->where('country', 'like', $request->clubCountryValue. '%')
                    ->where('city', 'like', $request->clubCityValue. '%')
                    ->where('tournament_points', '<=', $request->clubMaxTournamentPointsValue)
                    ->paginate(3);

                $view = view('dynamic-content.clubs.searchable-cards', compact('clubs'))->render();
                return response()->json($view);
            }

            $clubs = Club::where('name', 'like', $request->clubNameValue. '%')
                ->where('country', 'like', $request->clubCountryValue. '%')
                ->where('city', 'like', $request->clubCityValue. '%')
                ->paginate(3);

            $view = view('dynamic-content.clubs.searchable-cards', compact('clubs'))->render();
            return response()->json($view);

        }
    }
}
