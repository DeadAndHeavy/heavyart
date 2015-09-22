<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'password', 'game_class_id', 'game_faction_id', 'game_race_id', 'gender'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function gameClass()
    {
        return $this->belongsTo('App\GameClass');
    }

    public function gameFaction()
    {
        return $this->belongsTo('App\GameFaction');
    }

    public function gameRace()
    {
        return $this->belongsTo('App\GameRace');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task', 'user_id');
    }

    public function taskVotes()
    {
        return $this->hasMany('App\TaskVote', 'user_id');
    }

}
