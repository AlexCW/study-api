<?php

namespace App\Http\Controllers\Api;

use App\Contracts\TopicContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\Topics;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicsController extends Controller
{
    /**
     * @var TopicContract
     */
    private $topics;

    public function __construct(TopicContract $topics)
    {
        $this->topics = $topics;
    }

    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index()
    {
        return Topics::collection($this->topics->getAllTopics());
    }
}