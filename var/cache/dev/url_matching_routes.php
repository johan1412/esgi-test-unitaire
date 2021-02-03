<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/items' => [[['_route' => 'item_index', '_controller' => 'App\\Controller\\ItemController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/items/store' => [[['_route' => 'item_new', '_controller' => 'App\\Controller\\ItemController::store'], null, ['POST' => 0], null, false, false, null]],
        '/api/todolists' => [[['_route' => 'Todolist_index', '_controller' => 'App\\Controller\\TodolistController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/todolists/store' => [[['_route' => 'Todolist_new', '_controller' => 'App\\Controller\\TodolistController::store'], null, ['POST' => 0], null, false, false, null]],
        '/api/users' => [[['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/users/store' => [[['_route' => 'user_store', '_controller' => 'App\\Controller\\UserController::store'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/(?'
                    .'|items/([^/]++)(?'
                        .'|(*:194)'
                    .')'
                    .'|todolists/([^/]++)(?'
                        .'|(*:224)'
                    .')'
                    .'|users/([^/]++)(?'
                        .'|(*:250)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        194 => [
            [['_route' => 'item_show', '_controller' => 'App\\Controller\\ItemController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'item_edit', '_controller' => 'App\\Controller\\ItemController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'item_delete', '_controller' => 'App\\Controller\\ItemController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        224 => [
            [['_route' => 'Todolist_show', '_controller' => 'App\\Controller\\TodolistController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'Todolist_edit', '_controller' => 'App\\Controller\\TodolistController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'Todolist_delete', '_controller' => 'App\\Controller\\TodolistController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        250 => [
            [['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
