<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\View\Post;


use Shared\Model\Domain\Common\Slug;

class PostListItemView
{
    /** @var int */
    private $id;

    /** @var int */
    private $userId;

    /** @var string */
    private $author;

    /** @var string */
    private $name;

    /** @var \Shared\Model\Domain\Common\Slug */
    private $slug;

    /** @var string */
    private $category;

    /** @var \Shared\Model\Domain\Common\Slug */
    private $categorySlug;

    /** @var string */
    private $content;

    /** @var \Carbon\Carbon */
    private $creationDate;

    /**
     * @param int $id
     * @param int $userId
     * @param string $author
     * @param string $name
     * @param \Shared\Model\Domain\Common\Slug $slug
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
        Slug $slug,
        $category,
        Slug $categorySlug,
        $content,
        \Carbon\Carbon $creationDate
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->author = $author;
        $this->name = $name;
        $this->slug = $slug;
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
     * @return \Shared\Model\Domain\Common\Slug
     */
    public function getSlug()
    {
        return $this->slug;
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
}