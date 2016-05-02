<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = ['name', 'created_by', 'published'];

    public function images()
    {
    	return $this->hasMany('App\Image');
    }
}
