<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GameFaction extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'game_factions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['faction_name'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\User', 'game_faction_id');
    }

}
