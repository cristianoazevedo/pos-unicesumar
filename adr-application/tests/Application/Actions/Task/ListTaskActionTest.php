<?php
declare(strict_types=1);

namespace Tests\Application\Actions\Task;

use App\Application\Actions\Task\ListTaskAction;
use App\Domain\Task\Task;
use App\Infrastructure\Persistence\Task\TaskCreatorRepository;
use Illuminate\Database\Eloquent\Collection;
use Psr\Log\LoggerInterface;
use Slim\Psr7\Response;
use Tests\TestCase;
use Twig\Environment;

class ListTaskActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();
        $logger = $app->getContainer()->get(LoggerInterface::class);

        $taskRepository = $this->getMockBuilder(TaskCreatorRepository::class)
            ->setMethods(['all'])
            ->disableOriginalConstructor()
            ->getMock();


        $tasks = new Collection([
            new Task(['description' => 'test1']),
        ]);

        $taskRepository->expects($this->once())
            ->method('all')
            ->willReturn($tasks);

        $view = $this->getMockBuilder(Environment::class)
            ->setMethods(['render'])
            ->disableOriginalConstructor()
            ->getMock();


        $view->expects($this->once())
            ->method('render')
            ->willReturn('Rendered text on page');

        $request = $this->createRequest('GET', '/tasks');

        $action = new ListTaskAction($logger, $taskRepository, $view);
        $response = new Response();

        $returnedResponse = $action($request, $response, []);

        $this->assertSame((string)$returnedResponse->getBody(), 'Rendered text on page');
    }
}
