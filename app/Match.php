<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Match
 *
 * @property int $id
 * @property string|null $start_date_and_time
 * @property string|null $end_date_and_time
 * @property string $first_club
 * @property string $second_club
 * @property int $result_first_club
 * @property int $result_second_club
 * @property string|null $winner
 * @property string $status
 * @property int $tournament_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereEndDateAndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereFirstClub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereResultFirstClub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereResultSecondClub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereSecondClub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereStartDateAndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereWinner($value)
 * @mixin \Eloquent
 * @property-read \App\Tournament $tournament
 */
class Match extends Model
{
    protected $table = 'matches';

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }
}
