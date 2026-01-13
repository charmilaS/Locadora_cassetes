<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cassette;

class CassetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cassettes = [
            ['title' => 'Back to Black', 'genre' => 'Soul', 'year' => 2006],
            ['title' => 'Abbey Road', 'genre' => 'Rock', 'year' => 1969],
            ['title' => 'Thriller', 'genre' => 'Pop', 'year' => 1982],
            ['title' => 'Dark Side of the Moon', 'genre' => 'Progressive Rock', 'year' => 1973],
            ['title' => 'Nevermind', 'genre' => 'Grunge', 'year' => 1991],
        ];

        foreach ($cassettes as $cassette) {
            Cassette::create($cassette);
        }
    }
}
