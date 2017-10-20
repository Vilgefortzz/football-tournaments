<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FootballPosition
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootballPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootballPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootballPosition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FootballPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 */
class FootballPosition extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'football_position_user');
    }
}
