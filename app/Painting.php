<?php

namespace App;

class Painting extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naam', 'width', 'height', 'painted_at', 'retail', 'catagories', 'artist', 'image_location'
    ];
}
