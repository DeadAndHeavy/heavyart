<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GameRace extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'game_races';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['race_name'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\User', 'game_race_id');
    }

}
