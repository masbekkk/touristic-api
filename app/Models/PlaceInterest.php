<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceInterest extends Model
{
    use HasFactory;

    public function places()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id', 'id');
    }
}
