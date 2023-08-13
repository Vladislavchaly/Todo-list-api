<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

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

    public function update(int $id, int $userId, array $data): Task
    {
        return $this->model->where('id', $id)->where('user_id', $userId)->update($data);
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

        return $this->model->where('id', $id)->where('user_id', $userId)->get();
    }

    public function getAllByUserId(int $userId): \Illuminate\Support\Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }
}
