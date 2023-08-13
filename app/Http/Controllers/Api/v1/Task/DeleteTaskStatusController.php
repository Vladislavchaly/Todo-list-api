<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeleteTaskStatusController extends Controller
{
  public function __invoke(TaskRepository $taskRepository, int $id): JsonResponse
  {
      return response()->json($taskRepository->delete($id));
  }
}
