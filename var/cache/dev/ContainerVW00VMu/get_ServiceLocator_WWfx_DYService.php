<?php

namespace ContainerVW00VMu;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_WWfx_DYService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.WWfx.dY' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.WWfx.dY'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\ItemController::delete' => ['privates', '.service_locator.83t1iHB', 'get_ServiceLocator_83t1iHBService', true],
            'App\\Controller\\ItemController::edit' => ['privates', '.service_locator.83t1iHB', 'get_ServiceLocator_83t1iHBService', true],
            'App\\Controller\\ItemController::index' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController::show' => ['privates', '.service_locator.83t1iHB', 'get_ServiceLocator_83t1iHBService', true],
            'App\\Controller\\ToDoListController::delete' => ['privates', '.service_locator.aJ7VWpY', 'get_ServiceLocator_AJ7VWpYService', true],
            'App\\Controller\\ToDoListController::edit' => ['privates', '.service_locator.aJ7VWpY', 'get_ServiceLocator_AJ7VWpYService', true],
            'App\\Controller\\ToDoListController::index' => ['privates', '.service_locator.PM9fs6r', 'get_ServiceLocator_PM9fs6rService', true],
            'App\\Controller\\ToDoListController::new' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Controller\\ToDoListController::show' => ['privates', '.service_locator.aJ7VWpY', 'get_ServiceLocator_AJ7VWpYService', true],
            'App\\Controller\\UserController::delete' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Controller\\UserController::edit' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Controller\\UserController::index' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController::show' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'App\\Controller\\ItemController:delete' => ['privates', '.service_locator.83t1iHB', 'get_ServiceLocator_83t1iHBService', true],
            'App\\Controller\\ItemController:edit' => ['privates', '.service_locator.83t1iHB', 'get_ServiceLocator_83t1iHBService', true],
            'App\\Controller\\ItemController:index' => ['privates', '.service_locator.Rib71Kf', 'get_ServiceLocator_Rib71KfService', true],
            'App\\Controller\\ItemController:show' => ['privates', '.service_locator.83t1iHB', 'get_ServiceLocator_83t1iHBService', true],
            'App\\Controller\\ToDoListController:delete' => ['privates', '.service_locator.aJ7VWpY', 'get_ServiceLocator_AJ7VWpYService', true],
            'App\\Controller\\ToDoListController:edit' => ['privates', '.service_locator.aJ7VWpY', 'get_ServiceLocator_AJ7VWpYService', true],
            'App\\Controller\\ToDoListController:index' => ['privates', '.service_locator.PM9fs6r', 'get_ServiceLocator_PM9fs6rService', true],
            'App\\Controller\\ToDoListController:new' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Controller\\ToDoListController:show' => ['privates', '.service_locator.aJ7VWpY', 'get_ServiceLocator_AJ7VWpYService', true],
            'App\\Controller\\UserController:delete' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Controller\\UserController:edit' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'App\\Controller\\UserController:index' => ['privates', '.service_locator..Ae5NXw', 'get_ServiceLocator__Ae5NXwService', true],
            'App\\Controller\\UserController:show' => ['privates', '.service_locator.ch4Jgvl', 'get_ServiceLocator_Ch4JgvlService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
        ], [
            'App\\Controller\\ItemController::delete' => '?',
            'App\\Controller\\ItemController::edit' => '?',
            'App\\Controller\\ItemController::index' => '?',
            'App\\Controller\\ItemController::show' => '?',
            'App\\Controller\\ToDoListController::delete' => '?',
            'App\\Controller\\ToDoListController::edit' => '?',
            'App\\Controller\\ToDoListController::index' => '?',
            'App\\Controller\\ToDoListController::new' => '?',
            'App\\Controller\\ToDoListController::show' => '?',
            'App\\Controller\\UserController::delete' => '?',
            'App\\Controller\\UserController::edit' => '?',
            'App\\Controller\\UserController::index' => '?',
            'App\\Controller\\UserController::show' => '?',
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
            'App\\Controller\\ToDoListController:delete' => '?',
            'App\\Controller\\ToDoListController:edit' => '?',
            'App\\Controller\\ToDoListController:index' => '?',
            'App\\Controller\\ToDoListController:new' => '?',
            'App\\Controller\\ToDoListController:show' => '?',
            'App\\Controller\\UserController:delete' => '?',
            'App\\Controller\\UserController:edit' => '?',
            'App\\Controller\\UserController:index' => '?',
            'App\\Controller\\UserController:show' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}
