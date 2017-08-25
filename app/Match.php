<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Match
 *
 * @property int $id
 * @property string $label
 * @property string $start_date_and_time
 * @property string $end_date_and_time
 * @property string|null $first_club
 * @property string|null $second_club
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Match whereLabel($value)
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
    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }
}
