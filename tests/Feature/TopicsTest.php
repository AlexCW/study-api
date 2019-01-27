<?php
namespace Tests\Unit;

use App\Models\Topic;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @coversDefaultClass App\Controllers\Api\TopicController
 * @group Topics
 * Test Case for Topics Controller
 */
class TopicsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @covers ::index
     * Test get topics returns all five topics.
     *
     * @return void
     */
    public function testGetTopicsReturnsAllFiveTopics()
    {
        factory(Topic::class, 5)->create();

        $response = $this->get('/api/topics');

        $response->assertJsonCount(5, 'data');

        $response->assertStatus(200);
    }

    public function testCreateTopicReturnsNewlyCreatedTopic()
    {
        $response = $this->json('POST', '/api/topics', [
            'name' => 'Test Name', 'description' => 'Test Description'
        ]);

        $response->assertJson([
            'data' => [
                'created-at' => date('Y-m-d H:i:s'),
                'name' => 'Test Name',
                'description' => 'Test Description'
            ]
        ]);
    }

    public function testCreateTopicReturnsValidationErrorWhenNoNameIsSentInTheRequest()
    {
        $response = $this->json('POST', '/api/topics', [
            'description' => 'Test Description'
        ]);

        $response->assertJson([
            'message' => 'There was a validation error with the request you have provided.',
            'errors' => [
                'name' => [
                    'A name is required.'
                ]
            ]
        ]);
    }

    public function testCreateTopicReturnsValidationErrorWhenNoDescriptionIsSentInTheRequest()
    {
        $response = $this->json('POST', '/api/topics', [
            'name' => 'Test Name'
        ]);

        $response->assertJson([
            'message' => 'There was a validation error with the request you have provided.',
            'errors' => [
                'description' => [
                    'A description is required.'
                ]
            ]
        ]);
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}