<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Illuminate\Support\Collection;

class ListPostResponse
{
    /** @var \Illuminate\Support\Collection */
    private $posts;

    /**
     * @param \Illuminate\Support\Collection $posts
     */
    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

}