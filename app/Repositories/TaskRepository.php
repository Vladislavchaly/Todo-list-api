<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class TaskRepository implements \App\Contracts\TaskRepository
{
    protected Task $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Task
    {
        $this->model->fill($data);

        $this->model->save();

        return $this->model;
    }

    public function update(int $id, array $data): Task
    {
        $task = $this->model::find($id);

        if ($task) {
            $task->update($data);
        }

        return $task;
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }

    public function getById(int $id): Task
    {
        return $this->model->find($id)->first();
    }

    public function getByIdAndUserId(int $id, int $userId): Task
    {

        return $this->model->where('id', $id)->where('user_id', $userId)->first();
    }

    public function getAllParentByUserId(int $userId, array $filter, ?int $page = 1, ?int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model::query()->where('user_id', $userId)->whereNull('parent_id');

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['priority_from'])) {
            $query->where('priority', '>=', $filters['priority_from']);
        }

        if (isset($filters['priority_to'])) {
            $query->where('priority', '<=', $filters['priority_to']);
        }

        if (isset($filters['title'])) {
            $query->where('title', 'LIKE', '%' . $filters['title'] . '%');
        }

        if (isset($filters['sort_by'])) {
            $query->orderBy($filters['sort_by']);
        }

        return $query->paginate($limit, ['*'], 'page', $page);
    }

    public function getAllByUserId(int $userId, array $filter, int $page, int $limit): LengthAwarePaginator
    {
        return $this->model::query()->where('user_id', $userId)->paginate($limit, ['*'], 'page', $page);
    }
}
