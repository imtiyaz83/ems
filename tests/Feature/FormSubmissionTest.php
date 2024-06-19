<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Speaker;

class FormSubmissionTest extends TestCase
{
    public function it_stores_speaker_and_talk_proposal()
    {
        // Disable middleware
        $this->withoutMiddleware();

        // Step 1: Register a Speaker
        $speakerData = [
            'name' => 'Imtiyaz Khan',
            'email' => 'imtiyaazkhan@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password', // Added confirmation for validation
            'bio' => 'Test bio',
        ];

        // Simulate a POST request to the registration route
        $response = $this->postJson(route('speakerTest'), $speakerData);

        // Check if the speaker was successfully registered
        $response->assertStatus(201) // 201 for resource created
                 ->assertJson([
                     'message' => 'Registration successful.',
                     'speaker' => [
                         'name' => 'Imtiyaz Khan',
                         'email' => 'imtiyaazkhan@gmail.com',
                         'bio' => 'Test bio',
                     ]
                 ]);

        // Retrieve the registered speaker
        $speaker = Speaker::where('email', 'imtiyaazkhan@gmail.com')->first();

        // Step 2: Submit a Talk Proposal
        $talkProposalData = [
            'speaker_id' => $speaker->id,
            'title' => 'Tech Talks',
            'abstract' => 'This is test abstract.',
            'preferred_time_slot' => '10:00 AM',
        ];

        // Simulate a POST request to the talk proposal route
        $response = $this->postJson(route('talkProposals.talkTest'), $talkProposalData);

        // Check if the talk proposal was successfully created
        $response->assertStatus(201) // 201 for resource created
                 ->assertJson([
                     'speaker_id' => $speaker->id,
                     'title' => 'Tech Talks',
                     'abstract' => 'This is test abstract.',
                     'preferred_time_slot' => '10:00 AM',
                 ]);
    }
}
