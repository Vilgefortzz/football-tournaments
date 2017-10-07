<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\RequestToJoinTheClub
 *
 * @property int $id
 * @property int $club_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RequestToJoinTheClub whereClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RequestToJoinTheClub whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RequestToJoinTheClub whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RequestToJoinTheClub whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RequestToJoinTheClub whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Club $club
 * @property-read \App\User $user
 */
class RequestToJoinTheClub extends Model
{
    protected $table = 'requests_to_join_the_club';

    public function club(){
        return $this->belongsTo('App\Club');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
