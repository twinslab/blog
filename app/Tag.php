<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags'   ;

    /**
     * The fields that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get posts associated with a tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
} 