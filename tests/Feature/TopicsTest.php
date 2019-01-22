<?php
namespace Tests\Unit;

use Tests\TestCase;
//use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Test Case for Topics Controller
 */
class TopicsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetTopicsReturnsTopics()
    {
        $response = $this->get('/api/topics');

        $response->assertStatus(200);
    }
}