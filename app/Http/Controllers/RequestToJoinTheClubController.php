<?php

namespace App\Http\Controllers;

use App\RequestToJoinTheClub;
use Illuminate\Http\Request;

class RequestToJoinTheClubController extends Controller
{
    public function destroy(RequestToJoinTheClub $requestToJoinTheClub){

        if (request()->ajax()){

            $requestToJoinTheClub->delete();
            return response()->json('This request was rejected');
        }
    }
}
