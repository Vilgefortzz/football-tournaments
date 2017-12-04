<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Tournament
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $country
 * @property string $city
 * @property int $tournament_points
 * @property int $number_of_seats
 * @property int $number_of_occupied_seats
 * @property int $number_of_available_seats
 * @property int $in_game_clubs
 * @property int $eliminated_clubs
 * @property string $game_system
 * @property string $prize_first_place
 * @property string $prize_second_place
 * @property string $prize_third_place
 * @property string $status
 * @property int $goals
 * @property int $assists
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereAssists($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereEliminatedClubs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereGameSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereInGameClubs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereNumberOfAvailableSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereNumberOfOccupiedSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereNumberOfSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePrizeFirstPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePrizeSecondPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePrizeThirdPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereTournamentPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Club[] $clubs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Match[] $matches
 * @property-read \App\User $user
 */
class Tournament extends Model
{
    public function clubs(){
        return $this->belongsToMany('App\Club', 'club_tournament');
    }

    public function matches(){
        return $this->hasMany('App\Match');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function isOpen(){
        return $this->status == 'open' ? true : false;
    }

    public function isOngoing(){
        return $this->status == 'ongoing' ? true : false;
    }

    public function isClubJoined(){

        $clubId = Auth::user()->club->id;
        return $this->clubs->contains('id', $clubId);
    }

    public function isExpired(){
        return $this->start_date < date('Y-m-d');
    }

    public function isYourTournament(){

        $authUserId = Auth::user()->id;
        return $this->user->id == $authUserId ? true : false;
    }

    public function numberOfMatches(){
        return $this->matches->count();
    }

    public function numberOfFirstRoundMatches(){
        return $this->matches->where('round', 1)->count();
    }

    public function completedMatches(){

        $numberOfCompletedMatches = $this->matches->where('status', 'completed')->count();
        $numberOfAllMatches = $this->matches->count();

        return $numberOfCompletedMatches/$numberOfAllMatches * 100;
    }
}
