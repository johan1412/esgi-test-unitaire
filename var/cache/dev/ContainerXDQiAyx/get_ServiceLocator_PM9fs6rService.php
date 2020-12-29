<?php

namespace ContainerXDQiAyx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_PM9fs6rService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.PM9fs6r' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.PM9fs6r'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'toDoListRepository' => ['privates', 'App\\Repository\\ToDoListRepository', 'getToDoListRepositoryService', true],
        ], [
            'toDoListRepository' => 'App\\Repository\\ToDoListRepository',
        ]);
    }
}
