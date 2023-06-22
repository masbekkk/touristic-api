<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function interest()
    {
        return $this->hasMany(PlaceInterest::class, 'place_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'place_id', 'id');
    }
}
