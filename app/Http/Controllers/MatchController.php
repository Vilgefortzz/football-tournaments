<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function update(Match $match, Request $request){

        if (request()->ajax()){

            if ($request->name === 'start_date_and_time'){

                $start_date_and_time =
                    date_format(date_create_from_format('d/m/Y H:i', $request->value), 'Y-m-d H:i:s');

                if ($start_date_and_time >= $match->tournament->start_date
                    && $start_date_and_time <= $match->tournament->end_date){

                    $match->start_date_and_time = $start_date_and_time;
                    $match->save();

                    return response()->json('Match details were updated');
                }
                else{
                    return response()->json('Match details cannot be updated. Start date or end date is invalid');
                }
            }
        }
    }
}
