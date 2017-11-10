<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = Auth::user();

        if (request()->ajax()){

            if ($authUser->isFootballer()){
                return view('dynamic-content.users.footballers.dashboard');
            }
            elseif ($authUser->isClubPresident()){
                return view('dynamic-content.users.club-presidents.dashboard');
            }

        }
        else{

            if ($authUser->isFootballer()){
                return view('users.footballers.dashboard');
            }
            elseif ($authUser->isClubPresident()){
                return view('users.club-presidents.dashboard');
            }
            elseif ($authUser->isOrganizer()){
                return view('users.organizers.dashboard');
            }
        }

        flashy()->error('Error occurs during logging');
        return redirect()->to('/');
    }
}
