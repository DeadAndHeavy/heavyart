<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'task_id', 'comment_text'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
