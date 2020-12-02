<?php
declare(strict_types=1);

namespace App\Domain\Task;

use Illuminate\Database\Eloquent\Collection;

interface TaskRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param int $id
     * @return Task
     */
    public function find(int $id): Task;

    /**
     * @param string $description
     * @return bool
     */
    public function save(string $description): bool;
}
