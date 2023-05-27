<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeaveTeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usersCanLeaveTeams(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $user->currentTeam->users()->attach(
            $otherUser = User::factory()->create(), ['role' => 'admin']
        );

        $this->actingAs($otherUser);

        $response = $this->delete('/teams/' . $user->currentTeam->id . '/members/' . $otherUser->id);

        $this->assertCount(0, $user->currentTeam->fresh()->users);
    }

    /** @test */
    public function teamOwnersCantLeaveTheirOwnTeam(): void
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $response = $this->delete('/teams/' . $user->currentTeam->id . '/members/' . $user->id);

        $response->assertSessionHasErrorsIn('removeTeamMember', ['team']);

        $this->assertNotNull($user->currentTeam->fresh());
    }
}
