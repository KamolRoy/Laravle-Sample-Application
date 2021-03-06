<?php

namespace App;

use Cocur\Slugify\SlugifyInterface;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //
    protected $fillable =[
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body',
        'slug',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    /*public function category(){
        return $this->belongsTo('App\Category');
    }*/
}
