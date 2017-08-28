<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared;

return [
    'aliases' => [
        'db' => \Zend\Db\Adapter\Adapter::class,
    ],
    'invokables' => [
        \Zend\Db\Adapter\Adapter::class,
        \Zend\Authentication\AuthenticationService::class,
    ],
];