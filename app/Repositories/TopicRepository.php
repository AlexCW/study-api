<?php

namespace App\Repositories;

use App\Contracts\TopicContract;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

class TopicRepository implements TopicContract
{
    /**
     * @var Topic
     */
    private $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    public function getAllTopics() : Collection
    {
        return $this->topic->all();
    }
}