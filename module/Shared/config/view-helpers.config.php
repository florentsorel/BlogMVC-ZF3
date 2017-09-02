<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared;

return [
    'invokables' => [
        'formElementError' => View\Helper\FormElementError::class,
        'markdown' => View\Helper\Markdown::class,
        'plural' => \Zend\I18n\View\Helper\Plural::class,
    ],
    'factories' => [
        'flashMessages' => View\Helper\Factory\FlashMessagesFactory::class,
    ],
];