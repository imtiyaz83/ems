<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TalkProposal;
use Illuminate\Support\Facades\Auth;

class TalkProposalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_talk_proposal_and_returns_json_response()
    {
        // Data to be sent with the POST request
        $talkProposalData = [
            'title' => 'Tech Talks',
            'abstract' => 'This is test abstract.',
            'preferred_time_slot' => '10:00 AM',
        ];

        // Simulate a POST request to the talkTest route
        $response = $this->postJson(route('talkTest'), $talkProposalData);

        // Check if the talk proposal was successfully created
        $response->assertStatus(201) // 201 for resource created
                 ->assertJson([
                     'message' => 'Proposal successful.',
                     'talkProposal' => [
                         'title' => 'Tech Talks',
                         'abstract' => 'This is test abstract.',
                         'preferred_time_slot' => '10:00 AM',
                         // Add more fields if necessary
                     ]
                 ]);

        // Verify the talk proposal exists in the database
        $this->assertDatabaseHas('talk_proposals', [
            'title' => 'Tech Talks',
            'abstract' => 'This is test abstract.',
            'preferred_time_slot' => '10:00 AM',
            'speaker_id' => $user->id, // Ensure the speaker_id matches the authenticated user
        ]);
    }
}
