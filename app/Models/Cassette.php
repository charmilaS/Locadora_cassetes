<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cassette extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'year',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
