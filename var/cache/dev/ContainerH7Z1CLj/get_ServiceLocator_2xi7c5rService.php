<?php

namespace ContainerH7Z1CLj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_2xi7c5rService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.2xi7c5r' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.2xi7c5r'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'TodolistRepository' => ['privates', 'App\\Repository\\TodolistRepository', 'getTodolistRepositoryService', true],
        ], [
            'TodolistRepository' => 'App\\Repository\\TodolistRepository',
        ]);
    }
}
