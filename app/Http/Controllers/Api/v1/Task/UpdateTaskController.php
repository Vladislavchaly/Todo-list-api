<?php

namespace App\Http\Controllers\Api\v1\Task;

use App\Contracts\TaskRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class UpdateTaskController extends Controller
{
    /**
     * @OA\Put(
     *     path="/api/task/{id}",
     *     summary="Update a task by ID",
     *     description="Update a task by its ID.",
     *     operationId="updateTaskById",
     *     tags={"Tasks"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the task",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="parentId", type="integer"),
     *             @OA\Property(property="priority", type="integer"),
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="completedAt", type="string", format="date-time"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response with updated task",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized: Bearer token is missing or invalid",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Task not found",
     *     ),
     * )
     */
    public function __invoke(UpdateTaskRequest $request, TaskRepository $taskRepository, Task $task): JsonResponse
    {
        return response()->json(TaskResource::make($taskRepository->update($task->id, $request->all())));
    }
}
