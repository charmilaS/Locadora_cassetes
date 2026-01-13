<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
     protected $fillable = [
        'cassette_id',
        'user_id',
        'rented_at',
        'returned_at',
    ];

    public function cassette()
    {
        return $this->belongsTo(Cassette::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
