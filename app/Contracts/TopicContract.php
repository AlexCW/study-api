<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface TopicContract
{
    /**
     * Gets all the topics matching the specified criteria.
     * @return Collection
     */
    public function getAllTopics() : Collection;
}