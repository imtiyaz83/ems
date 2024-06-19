<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Speaker;
use Illuminate\Support\Facades\Hash;

class SpeakerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_speaker_and_returns_json_response()
    {
        // Data to be sent with the POST request
        $speakerData = [
            'name' => 'Imtiyaz Khan',
            'email' => 'imtiyaazkhan@gmail.com',
            'password' => 'password123',
            'bio' => 'Test bio',
        ];

        // Simulate a POST request to the speakerTest route
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

        // Verify the speaker exists in the database
        $this->assertDatabaseHas('speakers', [
            'name' => 'Imtiyaz Khan',
            'email' => 'imtiyaazkhan@gmail.com',
            'bio' => 'Test bio',
        ]);
    }
}
