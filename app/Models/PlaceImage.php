<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceImage extends Model
{
    use HasFactory;
    // protected $keyType = 'string';

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}
