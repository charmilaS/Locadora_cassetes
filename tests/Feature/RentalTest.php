<?php

use App\Models\User;
use App\Models\Cassette;
use App\Models\Rental;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

//test setup
beforeEach(function () {
    $this->user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password')
    ]);

    $this->cassette = Cassette::create([
        'title' => 'Cassete Teste',
        'genre' => 'Rock',
        'year'  => 1999
    ]);
});

// test
test('user can list cassettes', function () {
    $response = $this->actingAs($this->user)->getJson('/api/cassettes');

    $response->assertStatus(200)
             ->assertJsonFragment([
                 'title' => 'Cassete Teste',
                 'available' => true
             ]);
});

//test
test('user can rent a cassette', function () {
    $response = $this->actingAs($this->user)->postJson('/api/rentals', [
        'cassette_id' => $this->cassette->id
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('rentals', [
        'cassette_id' => $this->cassette->id,
        'user_id' => $this->user->id,
        'returned_at' => null
    ]);
});

//test
test('user can return a cassette', function () {
    $rental = Rental::create([
        'cassette_id' => $this->cassette->id,
        'user_id' => $this->user->id,
        'rented_at' => now()
    ]);

    $response = $this->actingAs($this->user)->postJson("/api/rentals/{$rental->id}/return");

    $response->assertStatus(200);

    $this->assertNotNull(Rental::find($rental->id)->returned_at);
});
