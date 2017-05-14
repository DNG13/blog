<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $dates = ['published_at'];
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable =['title', 'content'];
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
