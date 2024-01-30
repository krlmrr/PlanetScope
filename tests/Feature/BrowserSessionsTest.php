<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

test('other browser sessions can be logged out', function () {
    actingAs(User::factory()->create())
        ->delete('/user/other-browser-sessions', [
            'password' => 'password',
        ])->assertSessionHasNoErrors();
});
