<?php
declare(strict_types=1);

namespace App\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class Responder
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param null $data
     * @param int $statusCode
     * @return Response
     */
    public function respondWithData(Response $response, $data = null, int $statusCode = 200): Response
    {
        $payload = new ActionPayload($statusCode, $data);

        return $this->respond($response, $payload);
    }

    /**
     * @param ActionPayload $payload
     * @return Response
     */
    public function respond(Response $response, ActionPayload $payload): Response
    {
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $response->getBody()->write($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($payload->getStatusCode());
    }

    /**
     * @param ActionView $actionView
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(Response $response, ActionView $actionView): Response
    {
        $response->getBody()->write(
            $this->twig->render($actionView->getTemplate(), $actionView->getData())
        );

        return $response
            ->withHeader('Content-Type', 'text/html')
            ->withStatus($actionView->getStatusCode());
    }

    /**
     * @param Response $response
     * @param string $path
     * @param int $statusCode
     * @return Response
     */
    public function redirect(Response $response, string $path = "/", int $statusCode = 200): Response
    {
        return $response->withHeader('Location', $path)->withStatus($statusCode);
    }
}
