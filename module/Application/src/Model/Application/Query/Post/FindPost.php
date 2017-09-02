<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Application\Model\Infrastructure\Finder\Comment\CommentViewFinder;
use Application\Model\Infrastructure\Finder\Post\PostViewFinder;
use Application\Model\Infrastructure\View\Post\CommentView;
use Illuminate\Support\Collection;
use Shared\Model\Application\Exception\NotFoundException;
use Shared\Model\Domain\Common\Slug;

class FindPost
{
    /** @var \Application\Model\Infrastructure\Finder\Post\PostViewFinder */
    private $postFinder;

    /** @var \Application\Model\Infrastructure\Finder\Comment\CommentViewFinder */
    private $commentFinder;

    /**
     * @param \Application\Model\Infrastructure\Finder\Post\PostViewFinder $postFinder
     * @param \Application\Model\Infrastructure\Finder\Comment\CommentViewFinder $commentFinder
     */
    public function __construct(
        PostViewFinder $postFinder,
        CommentViewFinder $commentFinder
    ) {
        $this->postFinder = $postFinder;
        $this->commentFinder = $commentFinder;
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

        if ($post->hasComments() === true) {
            $commentCollection = new Collection();
            $comments = $this->commentFinder->findAllByPostId($post->getId());

            $comments->map(function(CommentView $comment) use($post, $commentCollection) {
                if(in_array($comment->getId(), $post->getCommentIds())) {
                    $commentCollection->push($comment);
                }
            });

            $post->setComments($commentCollection);
        }

        return new FindPostResponse($post);
    }

}