<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_speaker_and_talk_proposal()
    {
        $speakerData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'bio' => 'A speaker bio.',
        ];

        $this->post(route('speakers.store'), $speakerData)
             ->assertStatus(201)
             ->assertJson($speakerData);

        $speaker = \App\Models\Speaker::where('email', 'john@example.com')->first();

        $talkProposalData = [
            'speaker_id' => $speaker->id,
            'title' => 'A great talk',
            'abstract' => 'This is a talk abstract.',
            'preferred_time_slot' => '10:00 AM',
        ];

        $this->post(route('talkProposals.store'), $talkProposalData)
             ->assertStatus(201)
             ->assertJson($talkProposalData);
    }
}
