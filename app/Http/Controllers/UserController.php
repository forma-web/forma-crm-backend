<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class UserController extends Controller
{
    /**
     * @var \App\Http\Repositories\UserRepository
     */
    private UserRepository $repository;

    /**
     * @param \App\Http\Repositories\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection($this->repository->getAllUsers());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\UserResource
     */
    public function show(int $id): UserResource
    {
        return new UserResource($this->repository->getUserById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateUserRequest $request, int $id): void
    {
        $this->repository->getUserById($id)->update($request->validated());
    }
}
