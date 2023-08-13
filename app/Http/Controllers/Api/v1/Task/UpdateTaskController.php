<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Http\JsonResponse;

class UpdateTaskController extends Controller
{
    public function __invoke(UpdateTaskRequest $request, TaskRepository $taskRepository, int $id): JsonResponse
    {
        return response()->json($taskRepository->update($id, $request->user()->id, $request->all()));
    }
}
