<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskStatusRequest;
use Illuminate\Http\JsonResponse;
class UpdateTaskStatusController extends Controller
{
  public function __invoke(UpdateTaskStatusRequest $request, TaskRepository $taskRepository, int $id): JsonResponse
  {
      return response()->json($taskRepository->update($id, $request->all()));
  }
}
