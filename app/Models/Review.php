<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function place_reviewed()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}
