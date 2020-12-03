<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Application\Model\Task\TaskRepository;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * @var TaskRepository
     */
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $tasks = $this->repository->all();
        $viewModel = new ViewModel();

        $viewModel->setVariable('tasks', $tasks);

        return $viewModel;
    }

    public function saveAction()
    {
        $formData = $this->getRequest()->getPost();

        $this->repository->save($formData['description']);

        return $this->redirect()->toRoute('home');
    }

    public function doneAction()
    {
        $jsonModel = new JsonModel();
        $taskId = $this->params('id');

        $task = $this->repository->find((int)$taskId);

        $task->done = $task->done ? 0 : 1;

        $task->save();

        $jsonModel->setVariable('task', $task);

        return $jsonModel;
    }
}
