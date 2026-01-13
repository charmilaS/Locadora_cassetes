<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cassette;
use App\Models\User;
use App\Models\Rental;

class CassetteController extends Controller
{
  public function index()
  {
    $cassettes = Cassette::with([
      'rentals' => function ($query) {
        $query->whereNull('returned_at')->with('user');
      }
    ])->get();
    return $cassettes->map(function ($cassette){
        return [
            'id' => $cassette->id,
            'title' => $cassette->title,
            'available'=> $cassette->rentals->isEmpty(),
        ];
    });
  }
}
