<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $username
 * @property string $avatar_dir
 * @property string $avatar
 * @property string $password
 * @property string|null $country
 * @property string|null $city
 * @property string|null $main_football_position
 * @property int $goals
 * @property int $assists
 * @property int $number_of_clubs
 * @property int $number_of_contracts
 * @property int $played_matches
 * @property int $completed_tournaments
 * @property int $won_matches
 * @property int $won_tournaments
 * @property int $won_trophies
 * @property int $matches_win_rate
 * @property int $tournaments_win_rate
 * @property int $trophies_win_rate
 * @property int $role_id
 * @property int|null $club_id
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAssists($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatarDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCompletedTournaments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMainFootballPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMatchesWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumberOfClubs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNumberOfContracts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePlayedMatches($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTournamentsWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrophiesWinRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWonMatches($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWonTournaments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWonTrophies($value)
 * @mixin \Eloquent
 * @property-read \App\Club|null $club
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract[] $contracts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Notification[] $notifications
 * @property-read \App\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RequestToJoinTheClub[] $requestsToJoinTheClub
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootballPosition[] $footballPositions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tournament[] $tournaments
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function club(){
        return $this->belongsTo('App\Club');
    }

    public function contracts(){
        return $this->hasMany('App\Contract');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function requestsToJoinTheClub(){
        return $this->hasMany('App\RequestToJoinTheClub');
    }

    public function tournaments(){
        return $this->hasMany('App\Tournament');
    }

    public function footballPositions(){
        return $this->belongsToMany('App\FootballPosition', 'football_position_user');
    }

    public function isFootballer(){
        return $this->role_id == Role::Footballer ? true : false;
    }

    public function isClubPresident(){
        return $this->role_id == Role::ClubPresident ? true : false;
    }

    public function isOrganizer(){
        return $this->role_id == Role::Organizer ? true : false;
    }

    public function isAdmin(){
        return $this->role_id == Role::Admin ? true : false;
    }

    public function haveClub(){
        return $this->club ? true : false;
    }

    public function haveCountryAndCity(){
        return ($this->country && $this->city) ? true : false;
    }

    public function haveCountry(){
        return $this->country ? true : false;
    }

    public function haveCity(){
        return $this->city ? true : false;
    }

    public function isInYourClub(){
        $authUserId = Auth::user()->id;
        return $this->club->users->contains('id', $authUserId);
    }

    public function isThatYou(){
        $authUserId = Auth::user()->id;
        return $this->id === $authUserId ? true : false;
    }

    public function isContractProposed(){

        $authUserClubId = Auth::user()->club_id;
        return $this->contracts->contains('club_id', $authUserClubId);
    }

    public function haveFootballPositions(){
        return $this->footballPositions->isNotEmpty();
    }

    public function haveMainFootballPosition(){
        return $this->main_football_position ? true : false;
    }

    public function haveThreeFootballPositions(){
        return $this->footballPositions->count() === 3 ? true : false;
    }

    public function haveBindingContract(){

        if ($this->contracts->contains('status', 'signed')
            || $this->contracts->contains('status', 'extension proposed')){
            return true;
        }

        return false;
    }

    public function numberOfFootballPositions(){
        return $this->footballPositions->count();
    }

    public function numberOfWaitingContracts(){
        return $this->contracts->where('status', 'created')->count();
    }

    public function numberOfOngoingTournaments(){
        return $this->tournaments->where('status', 'ongoing')->count();
    }

    public function numberOfClosedTournaments(){
        return $this->tournaments->where('status', 'closed')->count();
    }
}
