<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Exceptions\UncompletedSubtasksException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskStatusRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class UpdateTaskStatusController extends Controller
{
    public function __invoke(UpdateTaskStatusRequest $request, TaskRepository $taskRepository, Task $task): JsonResponse
    {
        try {
            return response()->json(TaskResource::make($taskRepository->updateStatus($task->id, $request->status)));
        }catch (UncompletedSubtasksException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
