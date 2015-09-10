<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comics extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comicses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'comics_id');
    }

}
