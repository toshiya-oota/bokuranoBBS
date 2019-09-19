<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use searchable;
    protected $fillable = [
        'title',
        'body',
        ];
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
}