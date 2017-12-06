<?php

namespace App\Http\Controllers;

use App\Match;
use App\Tournament;
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

            $tournament = $match->tournament;

            if ($request->name === 'result_first_club'){

                $result_first_club = $request->value !== null ? intval($request->value) : null;
                $match->result_first_club = $result_first_club;

                if ($result_first_club !== null && $result_first_club >= 0){

                    $match->result_first_club = $result_first_club;

                    if ($match->result_second_club !== null){

                        if ($match->result_first_club > $match->result_second_club){
                            $match->winner_club_id = $match->first_club_id;
                            $match->loser_club_id = $match->second_club_id;

                            if ($match->status !== 'completed'){
                                $match->status = 'completed';
                                $tournament->in_game_clubs--;
                                $tournament->eliminated_clubs++;
                            }
                        }
                        elseif ($match->result_first_club < $match->result_second_club){
                            $match->winner_club_id = $match->second_club_id;
                            $match->loser_club_id = $match->first_club_id;

                            if ($match->status !== 'completed'){
                                $match->status = 'completed';
                                $tournament->in_game_clubs--;
                                $tournament->eliminated_clubs++;
                            }
                        }
                        else{
                            $match->winner_club_id = null;
                            $match->loser_club_id = null;

                            if ($match->status !== 'created') {
                                $match->status = 'created';
                                $tournament->in_game_clubs++;
                                $tournament->eliminated_clubs--;
                            }
                        }

                        $match->save();
                        $this->updateMatches($match->tournament);

                        $tournament->save();
                    }
                    else{
                        $match->save();
                    }

                    return response()->json('Match details were updated');
                }
                elseif ($result_first_club === null){

                    $match->winner_club_id = null;
                    $match->loser_club_id = null;

                    if ($match->status !== 'created') {
                        $match->status = 'created';
                        $tournament->in_game_clubs++;
                        $tournament->eliminated_clubs--;
                    }

                    $match->save();
                    $this->updateMatches($match->tournament);

                    $tournament->save();

                    return response()->json('Match details were updated');
                }
                else{

                    return response()->json('Match details cannot be updated. Result cannot be negative number');
                }
            }

            if ($request->name === 'result_second_club'){

                $result_second_club = $request->value !== null ? intval($request->value) : null;
                $match->result_second_club = $result_second_club;

                if ($result_second_club !== null && $result_second_club >= 0){

                    if ($match->result_first_club !== null){

                        if ($match->result_first_club > $match->result_second_club){
                            $match->winner_club_id = $match->first_club_id;
                            $match->loser_club_id = $match->second_club_id;

                            if ($match->status !== 'completed'){
                                $match->status = 'completed';
                                $tournament->in_game_clubs--;
                                $tournament->eliminated_clubs++;
                            }
                        }
                        elseif ($match->result_first_club < $match->result_second_club){
                            $match->winner_club_id = $match->second_club_id;
                            $match->loser_club_id = $match->first_club_id;

                            if ($match->status !== 'completed'){
                                $match->status = 'completed';
                                $tournament->in_game_clubs--;
                                $tournament->eliminated_clubs++;
                            }
                        }
                        else{
                            $match->winner_club_id = null;
                            $match->loser_club_id = null;

                            if ($match->status !== 'created') {
                                $match->status = 'created';
                                $tournament->in_game_clubs++;
                                $tournament->eliminated_clubs--;
                            }
                        }

                        $match->save();
                        $this->updateMatches($match->tournament);

                        $tournament->save();
                    }
                    else{
                        $match->save();
                    }

                    return response()->json('Match details were updated');
                }
                elseif ($result_second_club === null){

                    $match->winner_club_id = null;
                    $match->loser_club_id = null;

                    if ($match->status !== 'created') {
                        $match->status = 'created';
                        $tournament->in_game_clubs++;
                        $tournament->eliminated_clubs--;
                    }

                    $match->save();
                    $this->updateMatches($match->tournament);

                    $tournament->save();

                    return response()->json('Match details were updated');
                }
                else{

                    return response()->json('Match details cannot be updated. Result cannot be negative number');
                }

            }
        }
    }

    private function updateMatches(Tournament $tournament){

        $numberOfRounds = $tournament->matches->last()->round;

        for ($i=1; $i<$numberOfRounds; $i++){

            $j = $i+1;

            $roundMatches = $tournament->matches->where('round', $i);
            $nextRoundMatches = $tournament->matches->where('round', $j);
            $isFinalRound = $nextRoundMatches->count() === $numberOfRounds ? true : false;

            $winnersAndLosers = array();
            $counter = 0;

            foreach ($roundMatches as $roundMatch){
                $winnersAndLosers[$counter]['winner_club_id'] = $roundMatch->winner_club_id;
                $winnersAndLosers[$counter]['loser_club_id'] = $roundMatch->loser_club_id;

                $counter++;
            }

            if ($isFinalRound){

                // Final match
                $finalMatch = $nextRoundMatches->first();
                $finalMatch->first_club_id = $winnersAndLosers[0]['winner_club_id'];
                $finalMatch->second_club_id = $winnersAndLosers[1]['winner_club_id'];

                $finalMatch->save();

                // Third place match
                $thirdPlaceMatch = $nextRoundMatches->last();
                $thirdPlaceMatch->first_club_id = $winnersAndLosers[0]['loser_club_id'];
                $thirdPlaceMatch->second_club_id = $winnersAndLosers[1]['loser_club_id'];

                $thirdPlaceMatch->save();
            }
            else{

                $counter = 0;

                foreach ($nextRoundMatches as $nextRoundMatch){

                    $nextRoundMatch->first_club_id = $winnersAndLosers[$counter]['winner_club_id'];
                    $nextRoundMatch->second_club_id = $winnersAndLosers[$counter+1]['winner_club_id'];

                    $nextRoundMatch->save();
                    $counter++;
                }
            }

        }
    }
}
