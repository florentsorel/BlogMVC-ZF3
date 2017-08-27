<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */


return [
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions' => false,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../../module/Application/view/layout/application.phtml',
            'error/404' => __DIR__ . '/../../module/Shared/view/error/404.phtml',
            'error/index' => __DIR__ . '/../../module/Shared/view/error/index.phtml',
        ],
    ],

];
