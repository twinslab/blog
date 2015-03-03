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
} 