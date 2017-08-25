<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tournament
 *
 * @property int $id
 * @property string $name
 * @property string $start_date_and_time
 * @property string $end_date_and_time
 * @property string $country
 * @property string $city
 * @property int $points
 * @property int $number_of_seats
 * @property int $number_of_occupied_seats
 * @property int $number_of_available_seats
 * @property string $game_system
 * @property string $prize_first_place
 * @property string $prize_second_place
 * @property string $prize_third_place
 * @property string $status
 * @property int $goals
 * @property int $assists
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereAssists($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereEndDateAndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereGameSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereNumberOfAvailableSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereNumberOfOccupiedSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereNumberOfSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePrizeFirstPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePrizeSecondPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament wherePrizeThirdPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereStartDateAndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tournament whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Club[] $clubs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Match[] $matches
 */
class Tournament extends Model
{
    public function clubs(){
        return $this->belongsToMany('App\Club');
    }

    public function matches(){
        return $this->hasMany('App\Match');
    }
}
