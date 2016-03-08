<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $table = 'paintings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naam',
        'description',
        'width',
        'height',
        'year',
        'retail',
        'catagories',
        'artist',
        'image_location'
    ];


}
