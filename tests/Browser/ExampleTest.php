<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

uses(DuskTestCase::class);

it('basic example', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSee('Laravel');
    });
})->skip('Not finished');
