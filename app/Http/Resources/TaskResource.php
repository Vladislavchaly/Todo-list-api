<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    /**
     * @OA\Schema(
     *     schema="Task",
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="title", type="string"),
     *     @OA\Property(property="status", type="string"),
     *     @OA\Property(property="priority", type="integer"),
     *     @OA\Property(property="created_at", type="string", format="date-time"),
     *     @OA\Property(property="sub_task", type="array", @OA\Items(ref="#/components/schemas/Task")),
     * )
     */

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'priority' => $this->priority,
            'created_at' => $this->created_at,
            'sub_tasks' => TaskResource::collection($this->subtasks),
        ];
    }
}
