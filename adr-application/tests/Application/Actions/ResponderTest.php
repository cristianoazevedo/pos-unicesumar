<?php
declare(strict_types=1);

namespace Tests\Application\Actions;

use App\Application\Actions\ActionView;
use App\Application\Actions\Responder;
use Slim\Psr7\Response;
use Tests\TestCase;
use Twig\Environment;

class ResponderTest extends TestCase
{
    public function testRender()
    {
        $html = "<h1>Hello word</h1>";
        $view = $this->getMockBuilder(Environment::class)
            ->setMethods(['render'])
            ->disableOriginalConstructor()
            ->getMock();

        $view->method('render')->willReturn($html);

        $responder = new Responder($view);
        $response = new Response();

        $returnedResponse = $responder->render($response, new ActionView([], 'home.twig'));

        $this->assertSame((string)$returnedResponse->getBody(), $html);
    }
}