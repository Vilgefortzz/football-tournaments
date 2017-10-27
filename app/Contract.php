<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contract
 *
 * @property int $id
 * @property string|null $date_and_time_of_signing
 * @property string|null $date_and_time_of_end
 * @property string $duration
 * @property string|null $extended_duration
 * @property string $status
 * @property string $club_name
 * @property string $user_name
 * @property int $club_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereClubName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereDateAndTimeOfEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereDateAndTimeOfSigning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereExtendedDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contract whereUserName($value)
 * @mixin \Eloquent
 * @property-read \App\Club $club
 * @property-read \App\User $user
 */
class Contract extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function club(){
        return $this->belongsTo('App\Club');
    }
}
