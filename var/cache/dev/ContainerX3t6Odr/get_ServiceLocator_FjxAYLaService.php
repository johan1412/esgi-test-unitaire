<?php

namespace ContainerX3t6Odr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_FjxAYLaService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.fjxAYLa' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.fjxAYLa'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'serializer' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
            'validatorInterface' => ['services', '.container.private.validator', 'get_Container_Private_ValidatorService', false],
        ], [
            'serializer' => '?',
            'validatorInterface' => '?',
        ]);
    }
}
