<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewProject;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Task;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ProjectController
{
    public function __construct(private ProjectService $projectService)
    {
    }

    public function index(): ProjectCollection
    {
        return new ProjectCollection(Project::query()->with(['tasks'])->get());
    }

    public function store(StoreNewProject $request): ProjectResource
    {
        $input = $request->validated();

        $project = Project::create(Arr::only($input, ['name']));

        foreach ($input['tasks'] ?? [] as $inputTask) {
            Task::create($inputTask + ['project_id' => $project->id]);
        }

        $project->load('tasks');

        return new ProjectResource($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        $this->projectService->destroy($project);

        return response()
            ->json(null, 204);
    }
}
