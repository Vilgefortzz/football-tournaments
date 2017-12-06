<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Club
 *
 * @property int $id
 * @property string $name
 * @property string $emblem_dir
 * @property string $emblem
 * @property string $logo
 * @property string $founded_by
 * @property string $country
 * @property string $city
 * @property int $number_of_footballers
 * @property int $tournament_points
 * @property int $played_matches
 * @property int $completed_tournaments
 * @property int $won_matches
 * @property int $won_tournaments
 * @property int $won_trophies
 * @property int $matches_win_rate
 * @property int $tournaments_win_rate
 * @property int $trophies_win_rate
 * @property int $goals
 * @property int $conceded_goals
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCompletedTournaments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereConcededGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereEmblem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereEmblemDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereFoundedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereMatchesWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereNumberOfFootballers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club wherePlayedMatches($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereTournamentPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereTournamentsWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereTrophiesWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereWonMatches($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereWonTournaments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Club whereWonTrophies($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tournament[] $tournaments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Trophy[] $trophies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RequestToJoinTheClub[] $requestsToJoinTheClub
 */
class Club extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }

    public function tournaments(){
        return $this->belongsToMany('App\Tournament', 'club_tournament');
    }

    public function trophies(){
        return $this->hasMany('App\Trophy');
    }

    public function contracts(){
        return $this->hasMany('App\Contract');
    }

    public function requestsToJoinTheClub(){
        return $this->hasMany('App\RequestToJoinTheClub');
    }

    public function isRequestSentToJoin(){

        $authUserId = Auth::user()->id;
        return $this->requestsToJoinTheClub->contains('user_id', $authUserId);
    }

    public function isContractProposed(){

        $authUserId = Auth::user()->id;
        return $this->contracts->contains('user_id', $authUserId);
    }

    public function isYourClub(){

        $authUserId = Auth::user()->id;
        return $this->users->contains('id', $authUserId);
    }

    public function numberOfFootballerRequests(){
        return $this->requestsToJoinTheClub->count();
    }

    public function numberOfWaitingContracts(){
        return $this->contracts->where('status', 'created')->count();
    }

    public function numberOfSignedContracts(){
        return $this->contracts->where('status', 'signed')->count();
    }

    public function numberOfExtensionPropositionsForContracts(){
        return $this->contracts->where('status', 'extension proposed')->count();
    }

    public function numberOfOpenTournaments(){
        return $this->tournaments->where('status', 'open')->count();
    }

    public function numberOfOngoingTournaments(){
        return $this->tournaments->where('status', 'ongoing')->count();
    }

    public function numberOfClosedTournaments(){
        return $this->tournaments->where('status', 'closed')->count();
    }

    public function computeMatchesWinRate(){
        $this->matches_win_rate = $this->won_matches / $this->played_matches * 100;
    }

    public function computeTrophiesWinRate(){
        $this->trophies_win_rate = $this->won_trophies / $this->completed_tournaments * 100;
    }

    public function computeTournamentsWinRate(){
       $this->tournaments_win_rate = $this->won_tournaments / $this->completed_tournaments * 100;
    }

    public function addTournamentPoints(int $tournamentPoints){
        $this->tournament_points += $tournamentPoints;
    }

    public function placeOnTheLeaderboard(){

        $clubsLeaderboard = Club::orderBy('tournament_points', 'desc')->get();
        $placeOnTheLeaderboard = $clubsLeaderboard->pluck('id')->search($this->id) + 1;

        return $placeOnTheLeaderboard;
    }

    public function goalDifference(){

        $goalDifference = $this->goals - $this->conceded_goals;

        if ($goalDifference > 0){
            return '+'. $goalDifference;
        }

        return $goalDifference;
    }
}
