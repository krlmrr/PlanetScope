<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Mail\TeamInvitation;
use Tests\TestCase;

class InviteTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function team_members_can_be_invited_to_team(): void
    {
        if (! Features::sendsTeamInvitations()) {
            $this->markTestSkipped('Team invitations not enabled.');

            return;
        }

        Mail::fake();

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $response = $this->post('/teams/' . $user->currentTeam->id . '/members', [
            'email' => 'test@example.com',
            'role' => 'admin',
        ]);

        Mail::assertSent(TeamInvitation::class);

        $this->assertCount(1, $user->currentTeam->fresh()->teamInvitations);
    }

    /**
     * @test
     */
    public function team_member_invitations_can_be_cancelled(): void
    {
        if (! Features::sendsTeamInvitations()) {
            $this->markTestSkipped('Team invitations not enabled.');

            return;
        }

        Mail::fake();

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $invitation = $user->currentTeam->teamInvitations()->create([
            'email' => 'test@example.com',
            'role' => 'admin',
        ]);

        $response = $this->delete('/team-invitations/' . $invitation->id);

        $this->assertCount(0, $user->currentTeam->fresh()->teamInvitations);
    }
}
