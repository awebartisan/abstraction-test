<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function destroy(Project $project): bool
    {
        return DB::transaction(
            static function () use ($project) {
                $project->tasks()->delete();
                return $project->delete();
            }
        );
    }
}
