<?php
declare(strict_types=1);

use App\Domain\Task\TaskRepository;
use App\Infrastructure\Persistence\Task\TaskCreatorRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        TaskRepository::class => \DI\autowire(TaskCreatorRepository::class),
    ]);
};
