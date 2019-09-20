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
        'namemakeboard',
        'number',
        ];
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
}