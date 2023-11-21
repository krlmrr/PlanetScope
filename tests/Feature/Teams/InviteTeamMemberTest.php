<?php

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Mail\TeamInvitation;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\post;

test('team members can be invited to team', function () {
    Mail::fake();

    actingAs($user = User::factory()->withPersonalTeam()->create());

    post('/teams/' . $user->currentTeam->id . '/members', [
        'email' => 'test@example.com',
        'role' => 'admin',
    ]);

    Mail::assertSent(TeamInvitation::class);

    expect($user->currentTeam->fresh()->teamInvitations)->toHaveCount(1);
})->skip(fn () => ! Features::sendsTeamInvitations(), 'Team invitations not enabled.');

it('team member invitations can be cancelled', function () {
    Mail::fake();

    actingAs($user = User::factory()->withPersonalTeam()->create());

    $invitation = $user->currentTeam->teamInvitations()->create([
        'email' => 'test@example.com',
        'role' => 'admin',
    ]);

    delete('/team-invitations/' . $invitation->id);

    expect($user->currentTeam->fresh()->teamInvitations)->toHaveCount(0);
})->skip(fn () => ! Features::sendsTeamInvitations(), 'Send Invitations feature is turned off.');
