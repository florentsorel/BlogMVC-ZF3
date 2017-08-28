<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Application\Model\Infrastructure\Finder\Post\PostListItemViewFinder;

class ListPost
{
    /** @var \Application\Model\Infrastructure\Finder\Post\PostListItemViewFinder */
    private $postFinder;

    /**
     * @param \Application\Model\Infrastructure\Finder\Post\PostListItemViewFinder $postFinder
     */
    public function __construct(PostListItemViewFinder $postFinder)
    {
        $this->postFinder = $postFinder;
    }

    /**
     * @return \Application\Model\Application\Query\Post\ListPostResponse
     */
    public function handle()
    {
        $posts = $this->postFinder->findAll();

        return new ListPostResponse($posts);
    }

}