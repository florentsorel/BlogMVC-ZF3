<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application;

return [
    'factories' => [
        Controller\IndexController::class => \Shared\Controller\ServiceManagerAwareControllerFactory::class,
    ]
];