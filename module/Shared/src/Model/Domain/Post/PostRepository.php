<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\Model\Domain\Post;


interface PostRepository
{

    public function save();

    /**
     * @return \Illuminate\Support\Collection
     */
    public function findAll();

    /**
     * @param $postId
     * @return \Shared\Model\Domain\Post\Post
     */
    public function findById($postId);
}