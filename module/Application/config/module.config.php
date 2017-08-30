<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application;


return [
    'router' => [
        'routes' => [
            'application' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
            ],
            'post' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/:slug',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'read',
                    ],
                    'constraints' => [
                        'slug' => '[a-z0-9-]+',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
