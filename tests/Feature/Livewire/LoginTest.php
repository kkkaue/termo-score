<?php

use App\Livewire\Auth\Login;
use App\Models\User;

use function Pest\Livewire\livewire;

it('should be able to login', function () {
    $user = User::factory()->create([
        'email'    => 'user@test.com',
        'password' => bcrypt('password'),
    ]);
    livewire(Login::class)
        ->set('email', 'user@test.com')
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect();

    expect(auth())
        ->check()->toBeTrue()
        ->user()->id->toBe($user->id);
});
