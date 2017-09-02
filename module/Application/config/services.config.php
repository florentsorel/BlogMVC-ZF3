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
        Model\Infrastructure\Finder\Post\PostViewFinder::class => Model\Infrastructure\Finder\Post\PostViewFinderFactory::class,
        Model\Infrastructure\Finder\Comment\CommentViewFinder::class => Model\Infrastructure\Finder\Comment\CommentViewFinderFactory::class,

        // Query
        Model\Application\Query\Post\ListPost::class => Model\Application\Query\Post\ListPostFactory::class,
        Model\Application\Query\Post\FindPost::class => Model\Application\Query\Post\FindPostFactory::class,
    ]
];