<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Task;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskCreatorRepository implements TaskRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Task::all(['id', 'description', 'done']);
    }

    /**
     * @param string $description
     * @return bool
     */
    public function save(string $description): bool
    {
        $task = new Task;
        $task->description = $description;

        return $task->save();
    }

    /**
     * @param int $id
     * @return Task
     */
    public function find(int $id): Task
    {
        return Task::find($id);
    }
}
