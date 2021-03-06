<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Twig\Environment;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        Environment::class => function (ContainerInterface $c): Environment {
            $settings = $c->get('settings');
            $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../resources/views');

            $twig = new Twig\Environment($loader, [
                __DIR__ . '/../var/cache'
            ]);

            if (isset($settings['app_env']) && $settings['app_env'] === 'DEVELOPMENT') {
                $twig->enableDebug();
            }

            return $twig;
        }
    ]);
};
