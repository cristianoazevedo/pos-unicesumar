<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Mvc\MvcEvent;

class Module implements ConfigProviderInterface
{
    /**
     * @param MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $config = $application->getConfig();

        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection($config['db']);
        $capsule->bootEloquent();
    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
