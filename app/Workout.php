<?php

namespace Logit;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'routine_id',
        'duration_minutes',
    ];

    /**
     * Get the related workout junction
     */
    public function junction()
    {
        return $this->hasMany('Logit\WorkoutJunction');
    }
}
