<?php

namespace ContainerH7Z1CLj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EfR8di4Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.efR8di4' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.efR8di4'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\ItemController::delete' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController::edit' => ['privates', '.service_locator.LdgHOc4', 'get_ServiceLocator_LdgHOc4Service', true],
            'App\\Controller\\ItemController::index' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController::show' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController::store' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\TodolistController::delete' => ['privates', '.service_locator.2xi7c5r', 'get_ServiceLocator_2xi7c5rService', true],
            'App\\Controller\\TodolistController::edit' => ['privates', '.service_locator.vV2udfN', 'get_ServiceLocator_VV2udfNService', true],
            'App\\Controller\\TodolistController::index' => ['privates', '.service_locator.2xi7c5r', 'get_ServiceLocator_2xi7c5rService', true],
            'App\\Controller\\TodolistController::show' => ['privates', '.service_locator.2xi7c5r', 'get_ServiceLocator_2xi7c5rService', true],
            'App\\Controller\\TodolistController::store' => ['privates', '.service_locator.xYLkTaP', 'get_ServiceLocator_XYLkTaPService', true],
            'App\\Controller\\UserController::delete' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController::edit' => ['privates', '.service_locator..fvb3oH', 'get_ServiceLocator__Fvb3oHService', true],
            'App\\Controller\\UserController::index' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController::show' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController::store' => ['privates', '.service_locator.fjxAYLa', 'get_ServiceLocator_FjxAYLaService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'App\\Controller\\ItemController:delete' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController:edit' => ['privates', '.service_locator.LdgHOc4', 'get_ServiceLocator_LdgHOc4Service', true],
            'App\\Controller\\ItemController:index' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController:show' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController:store' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\TodolistController:delete' => ['privates', '.service_locator.2xi7c5r', 'get_ServiceLocator_2xi7c5rService', true],
            'App\\Controller\\TodolistController:edit' => ['privates', '.service_locator.vV2udfN', 'get_ServiceLocator_VV2udfNService', true],
            'App\\Controller\\TodolistController:index' => ['privates', '.service_locator.2xi7c5r', 'get_ServiceLocator_2xi7c5rService', true],
            'App\\Controller\\TodolistController:show' => ['privates', '.service_locator.2xi7c5r', 'get_ServiceLocator_2xi7c5rService', true],
            'App\\Controller\\TodolistController:store' => ['privates', '.service_locator.xYLkTaP', 'get_ServiceLocator_XYLkTaPService', true],
            'App\\Controller\\UserController:delete' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController:edit' => ['privates', '.service_locator..fvb3oH', 'get_ServiceLocator__Fvb3oHService', true],
            'App\\Controller\\UserController:index' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController:show' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController:store' => ['privates', '.service_locator.fjxAYLa', 'get_ServiceLocator_FjxAYLaService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
        ], [
            'App\\Controller\\ItemController::delete' => '?',
            'App\\Controller\\ItemController::edit' => '?',
            'App\\Controller\\ItemController::index' => '?',
            'App\\Controller\\ItemController::show' => '?',
            'App\\Controller\\ItemController::store' => '?',
            'App\\Controller\\TodolistController::delete' => '?',
            'App\\Controller\\TodolistController::edit' => '?',
            'App\\Controller\\TodolistController::index' => '?',
            'App\\Controller\\TodolistController::show' => '?',
            'App\\Controller\\TodolistController::store' => '?',
            'App\\Controller\\UserController::delete' => '?',
            'App\\Controller\\UserController::edit' => '?',
            'App\\Controller\\UserController::index' => '?',
            'App\\Controller\\UserController::show' => '?',
            'App\\Controller\\UserController::store' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\ItemController:delete' => '?',
            'App\\Controller\\ItemController:edit' => '?',
            'App\\Controller\\ItemController:index' => '?',
            'App\\Controller\\ItemController:show' => '?',
            'App\\Controller\\ItemController:store' => '?',
            'App\\Controller\\TodolistController:delete' => '?',
            'App\\Controller\\TodolistController:edit' => '?',
            'App\\Controller\\TodolistController:index' => '?',
            'App\\Controller\\TodolistController:show' => '?',
            'App\\Controller\\TodolistController:store' => '?',
            'App\\Controller\\UserController:delete' => '?',
            'App\\Controller\\UserController:edit' => '?',
            'App\\Controller\\UserController:index' => '?',
            'App\\Controller\\UserController:show' => '?',
            'App\\Controller\\UserController:store' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}
