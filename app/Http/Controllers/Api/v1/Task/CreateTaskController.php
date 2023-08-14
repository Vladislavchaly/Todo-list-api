<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\JsonResponse;

class CreateTaskController extends Controller
{
    public function __invoke(CreateTaskRequest $request, TaskRepository $taskRepository): JsonResponse
    {
        return response()->json(
            TaskResource::make(
                $taskRepository->create(
                    ['userId' => $request->user()->id, ...$request->all()]
                )
            )
        );
    }
}
