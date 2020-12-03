<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use App\Application\Actions\ActionView;
use Psr\Http\Message\ResponseInterface as Response;

class ListTaskAction extends TaskAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $tasks = $this->repository->all();

        $this->logger->info("task list was viewed.");

        $data = ['tasks' => $tasks->toArray()];

        return $this->render(new ActionView($data, 'home.twig'));
    }
}
