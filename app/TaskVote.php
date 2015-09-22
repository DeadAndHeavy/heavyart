<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskVote extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_votes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'task_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
