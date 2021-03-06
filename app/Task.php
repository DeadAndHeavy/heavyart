<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'task_text', 'status', 'rating'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function taskComments()
    {
        return $this->hasMany('App\TaskComment', 'task_id');
    }

}
