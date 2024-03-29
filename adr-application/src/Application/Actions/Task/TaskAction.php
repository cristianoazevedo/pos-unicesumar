<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use App\Application\Actions\Action;
use App\Application\Actions\Responder;
use App\Domain\Task\TaskRepository;
use Psr\Log\LoggerInterface;
use Twig\Environment;

abstract class TaskAction extends Action
{
    /**
     * @var TaskRepository
     */
    protected $repository;

    /**
     * @var Responder
     */
    protected $responder;

    /**
     * TaskAction constructor.
     * @param LoggerInterface $logger
     * @param TaskRepository $taskRepository
     * @param Environment $twig
     */
    public function __construct(LoggerInterface $logger, TaskRepository $taskRepository, Environment $twig)
    {
        parent::__construct($logger);
        $this->repository = $taskRepository;
        $this->responder = new Responder($twig);
    }
}
