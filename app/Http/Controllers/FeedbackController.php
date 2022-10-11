<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FeedbackRepository;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FeedbackController extends Controller
{
    /**
     * @var \App\Http\Repositories\FeedbackRepository
     */
    private FeedbackRepository $repository;

    /**
     * @param FeedbackRepository $repository
     */
    public function __construct(FeedbackRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return FeedbackResource::collection($this->repository->getFeedbackByPage());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\FeedbackResource
     */
    public function show(int $id): FeedbackResource
    {
        return new FeedbackResource($this->repository->getFeedbackById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreFeedbackRequest $request
     * @return \App\Http\Resources\FeedbackResource
     */
    public function store(StoreFeedbackRequest $request): FeedbackResource
    {
        return new FeedbackResource(Feedback::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFeedbackRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateFeedbackRequest $request, int $id): void
    {
        $this->repository->getFeedbackById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getFeedbackById($id)->delete();
    }
}
