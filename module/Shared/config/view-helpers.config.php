<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared;

return [
    'invokables' => [
        'formElementError' => View\Helper\FormElementError::class,
    ],
    'factories' => [
        'flashMessages' => View\Helper\Factory\FlashMessagesFactory::class,
    ],
];