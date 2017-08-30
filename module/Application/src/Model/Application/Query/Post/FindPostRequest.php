<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


class FindPostRequest
{
    /** @var string */
    private $slug;

    /**
     * @param string $slug
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

}