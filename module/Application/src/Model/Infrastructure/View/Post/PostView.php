<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\View\Post;


class PostView
{
    /** @var int */
    private $id;

    /** @var int */
    private $userId;

    /** @var string */
    private $author;

    /** @var string */
    private $name;

    /** @var string */
    private $category;

    /** @var \Shared\Model\Domain\Common\Slug */
    private $categorySlug;

    /** @var string */
    private $content;

    /** @var \Carbon\Carbon */
    private $creationDate;

    /** @var null|array */
    private $commentIds;

    /** @var null|\Illuminate\Support\Collection */
    private $comments;

    /** @var int */
    private $totalComment;

    /**
     * @param int $id
     * @param int $userId
     * @param string $author
     * @param string $name
     * @param string $category
     * @param \Shared\Model\Domain\Common\Slug $categorySlug
     * @param string $content
     * @param \Carbon\Carbon $creationDate
     */
    public function __construct(
        $id,
        $userId,
        $author,
        $name,
        $category,
        \Shared\Model\Domain\Common\Slug $categorySlug,
        $content,
        \Carbon\Carbon $creationDate
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->author = $author;
        $this->name = $name;
        $this->category = $category;
        $this->categorySlug = $categorySlug;
        $this->content = $content;
        $this->creationDate = $creationDate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return \Shared\Model\Domain\Common\Slug
     */
    public function getCategorySlug()
    {
        return $this->categorySlug;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return array|null
     */
    public function getCommentIds()
    {
        return $this->commentIds;
    }

    /**
     * @return bool
     */
    public function hasComments()
    {
        return $this->getCommentIds() !== null;
    }

    /**
     * @param array $commentIds
     */
    public function setCommentIds($commentIds)
    {
        $this->commentIds = $commentIds;
    }

    /**
     * @return null|\Illuminate\Support\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param \Illuminate\Support\Collection $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return int
     */
    public function getCommentCount()
    {
        return $this->hasComments() ? count($this->getComments()) : 0;
    }
}