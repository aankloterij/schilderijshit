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
        'artist',
        'description',
        'width',
        'height',
        'year',
        'retail',
        'catagories',
        'image_location'
    ];

    protected $appends = ['url'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function getUrlAttribute()
    {
        return url()->route('singlePainting', $this->id);
    }

}
