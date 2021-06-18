<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon as LaravelCarbon;

/**
 * @property int $id
 * @property string $name
 * @property LaravelCarbon $created_at
 * @property LaravelCarbon $updated_at
 *
 * @property EloquentCollection $tasks
 */
class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
