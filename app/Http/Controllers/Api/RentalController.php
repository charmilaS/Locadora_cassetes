<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cassette;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cassette_id' => 'required|exists:cassettes,id',
        ]);

        $alreadyRental = Rental::where('cassette_id', $request->cassette_id)
            ->whereNull('returned_at')
            ->first();

        if ($alreadyRental) {
            return response()->json(['message' => 'Cassette is already rented out.'], 400);
        }

        $rental = Rental::create([
            'user_id' => Auth::id(),
            'cassette_id' => $request->cassette_id,
            'rented_at' => now(),
        ]);

        $rental->load('cassette');

        return response()->json($rental, 201);
    }

    public function return(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        if ($rental->returned_at) {
            return response()->json(['message' => 'Rental already Returnet.'], 400);
        }

        $rental->returned_at = now();
        $rental->save();

        return response()->json($rental);
    }

    public function index()
    {
        $rentals = Rental::with('cassette', 'user')->get();
        return $rentals;
    }
}
