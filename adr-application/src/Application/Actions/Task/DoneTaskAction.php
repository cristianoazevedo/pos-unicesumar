<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use Psr\Http\Message\ResponseInterface as Response;

class DoneTaskAction extends TaskAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $taskId = (int) $this->resolveArg('id');
        $task = $this->repository->find($taskId);

        $task->done = $task->done ? 0 : 1;

        $task->save();

        return $this->respondWithData($task);
    }
}
