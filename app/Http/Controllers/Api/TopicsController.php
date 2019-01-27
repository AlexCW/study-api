<?php

namespace App\Http\Controllers\Api;

use App\Contracts\TopicContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Http\Resources\TopicsResource;
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
        return TopicsResource::collection($this->topics->getAllTopics());
    }

    /**
     * @param TopicRequest $request
     * @return TopicsResource
     */
    public function create(TopicRequest $request) : TopicsResource
    {
        return new TopicsResource($this->topics->createTopic($request->only([
            'name', 'description'
        ])));
    }
}