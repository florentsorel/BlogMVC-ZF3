<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Application\Model\Infrastructure\View\Post\PostView;

class FindPostResponse
{
    /** @var \Application\Model\Infrastructure\View\Post\PostView */
    private $post;

    /**
     * @param \Application\Model\Infrastructure\View\Post\PostView $post
     */
    public function __construct(PostView $post)
    {
        $this->post = $post;
    }

    /**
     * @return \Application\Model\Infrastructure\View\Post\PostView
     */
    public function getPost()
    {
        return $this->post;
    }

}