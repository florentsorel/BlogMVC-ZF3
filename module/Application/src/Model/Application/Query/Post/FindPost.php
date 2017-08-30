<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Application\Model\Infrastructure\Finder\Post\PostViewFinder;
use Shared\Model\Application\Exception\NotFoundException;
use Shared\Model\Domain\Common\Slug;

class FindPost
{
    /** @var \Application\Model\Infrastructure\Finder\Post\PostViewFinder */
    private $postFinder;

    /**
     * @param \Application\Model\Infrastructure\Finder\Post\PostViewFinder $postFinder
     */
    public function __construct(PostViewFinder $postFinder)
    {
        $this->postFinder = $postFinder;
    }

    /**
     * @param \Application\Model\Application\Query\Post\FindPostRequest $request
     * @return \Application\Model\Application\Query\Post\FindPostResponse
     */
    public function handle(FindPostRequest $request)
    {
        $post = $this->postFinder->findBySlug(
            Slug::createFromString($request->getSlug())
        );

        if ($post === null) {
            throw new NotFoundException(
                "Could not find post identified by \"{$request->getSlug()}\""
            );
        }

        return new FindPostResponse($post);
    }

}