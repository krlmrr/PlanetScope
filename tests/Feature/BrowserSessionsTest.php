<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

test('other browser sessions can be logged out', function () {
    actingAs($user = User::factory()->create());

    delete('/user/other-browser-sessions', [
        'password' => 'password',
    ])->assertSessionHasNoErrors();
});
