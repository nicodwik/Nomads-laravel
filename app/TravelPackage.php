<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TravelPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'country', 'description', 'featured_event', 'language', 
        'food', 'depature_date', 'duration', 'type', 'price'
    ];

    protected $hidden = [

    ];

    public function Galleries()
    {
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}
