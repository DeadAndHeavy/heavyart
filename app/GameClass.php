<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GameClass extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'game_classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['class_name'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\User', 'game_class_id');
    }

}
