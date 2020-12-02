<?php
declare(strict_types=1);

use App\Application\Actions\Task\DoneTaskAction;
use App\Application\Actions\Task\ListTaskAction;
use App\Application\Actions\Task\SaveTaskAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        return $response->withHeader('Location', '/tasks')->withStatus(200);
    });

    $app->group('/tasks', function (Group $group) {
        $group->get('', ListTaskAction::class);
        $group->post('', SaveTaskAction::class);
        $group->put('/{id}', DoneTaskAction::class);
    });
};
