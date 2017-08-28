<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application;

use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'application' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
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
