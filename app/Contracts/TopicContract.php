<?php

namespace App\Contracts;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;

interface TopicContract
{
    /**
     * Gets all the topics matching the specified criteria.
     * @return Collection
     */
    public function getAllTopics() : Collection;

    /**
     * Creates a new topic.
     * @param array $topic
     * @return Topic
     */
    public function createTopic(array $topic = []) : Topic;
}