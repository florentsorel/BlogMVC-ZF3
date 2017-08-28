<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application;

return [
    'factories' => [
        // Finder
        Model\Infrastructure\Finder\Post\PostListItemViewFinder::class => Model\Infrastructure\Finder\Post\PostListItemViewFinderFactory::class,

        // Query
        Model\Application\Query\Post\ListPost::class => Model\Application\Query\Post\ListPostFactory::class,
    ]
];