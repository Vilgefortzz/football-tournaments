<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Trophy
 *
 * @property int $id
 * @property string $label
 * @property string $name
 * @property string|null $club_name
 * @property int $club_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereClubId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereClubName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trophy whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Club $club
 */
class Trophy extends Model
{
    public function club(){
        return $this->belongsTo('App\Club');
    }
}
