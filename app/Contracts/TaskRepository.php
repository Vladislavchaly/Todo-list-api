<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskRepository
{
    public function create(array $data): Task;

    public function update(int $id, int $userId, array $data): Task;

    public function delete(int $id): bool;

    public function getAll(): Collection;

    public function getByIdAndUserId(int $id, int $userId): Task;

    public function getAllByUserId(int $userId): Collection;

    public function getById(int $id): Task;
}