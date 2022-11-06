<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * @property User $model
 */
final class UserRepository extends Repository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return User::class;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    /**
     * @param int $id
     * @return \App\Models\User
     */
    public function getUserById(int $id): User
    {
        return $this->model->findOrFail($id);
    }
}
