<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;
    protected $keyType = 'string';

    public function place()
    {
        return $this->hasMany(PlaceInterest::class, 'interest_id', 'id');
    }
}
