<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetTasksController extends Controller
{
    public function __invoke(Request $request, TaskRepository $taskRepository): JsonResponse
    {
        return response()->json($taskRepository->getAllByUserId($request->user()->id));
    }
}
