<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'tasks',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('project_id')->constrained();
                $table->string('title');
                $table->string('description');
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
}
