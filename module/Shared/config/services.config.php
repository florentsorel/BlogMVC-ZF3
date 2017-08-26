<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared;

return [
    'alias' => [
        'db' => \Zend\Db\Adapter\Adapter::class,
    ],
    'invokables' => [
        \Zend\Authentication\AuthenticationService::class,
    ],
    'factories' => [

    ]
];