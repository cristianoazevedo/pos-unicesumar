<?php
declare(strict_types=1);

namespace App\Application\Actions\Task;

use Psr\Http\Message\ResponseInterface as Response;

class SaveTaskAction extends TaskAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $formData = $this->request->getParsedBody();

        $this->repository->save($formData['description']);

        return $this->responder->redirect($this->response, '/tasks');
    }
}
