<?php

namespace App\Http\Repositories;

use App\Models\Feedback;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class FeedbackRepository extends BaseRepository
{
    private const FEEDBACK_PER_PAGE = 15;

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Feedback::class;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFeedbackByPage(): LengthAwarePaginator
    {
        return $this->model->latest()->paginate(self::FEEDBACK_PER_PAGE);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getFeedbackById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
