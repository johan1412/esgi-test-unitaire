<?php

namespace ContainerVW00VMu;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_AJ7VWpYService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.aJ7VWpY' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.aJ7VWpY'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'toDoList' => ['privates', '.errored..service_locator.aJ7VWpY.App\\Entity\\ToDoList', NULL, 'Cannot autowire service ".service_locator.aJ7VWpY": it references class "App\\Entity\\ToDoList" but no such service exists.'],
        ], [
            'toDoList' => 'App\\Entity\\ToDoList',
        ]);
    }
}