<?php
namespace Tests\Unit;

use App\Contracts\TopicContract;
use App\Models\Topic;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @coversDefaultClass App\Repositories\TopicRepository
 * @group Topics
 * Test Case for Topics Repository
 */
class TopicRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test get topics returns all five topics.
     *
     * @return void
     */
    public function testTopicContractReturnsInstanceOfTopicRepository()
    {
        $topicContract = $this->app->make(TopicContract::class);

        $this->assertInstanceOf(
            'App\Repositories\TopicRepository',
            $topicContract
        );
    }

    /**
     * @covers ::getAllTopics
     * Test get topics returns all five topics.
     *
     * @return void
     */
    public function testGetAllTopicsReturnsCollectionOfTopicEntities()
    {
        factory(Topic::class, 1)->create();

        $topicContract = $this->app->make(TopicContract::class);

        $topics = $topicContract->getAllTopics();

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $topics
        );

        $this->assertInstanceOf(
            'App\Models\Topic',
            $topics->first()
        );
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}