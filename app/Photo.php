<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $location = '/images/';
    //
    protected $fillable = ['file'];

    public function getFileAttribute($file){
        return $this-> location . $file;
    }


}
