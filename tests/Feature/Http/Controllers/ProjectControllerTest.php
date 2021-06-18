<?php

declare(strict_types=1);

namespace Http\Controllers;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    function a_new_project_can_be_stored_with_tasks()
    {
        // given
        $data = [
            'name' => $this->faker->words(3, true),
            'tasks' => [
                [
                    'title' => $this->faker->words(3, true),
                    'description' => $this->faker->sentence(),
                ],
                [
                    'title' => $this->faker->words(3, true),
                    'description' => $this->faker->sentence(),
                ],
            ],
        ];

        // when
        $response = $this->post(route('projects.store'), $data);

        // then
        $response->assertCreated();

        $project = Project::with(['tasks'])->first();

        self::assertEquals($data['name'], $project->name);
        self::assertCount(2, $project->tasks);
    }

}
