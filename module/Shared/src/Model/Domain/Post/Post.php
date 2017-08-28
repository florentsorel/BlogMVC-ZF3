<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\Model\Domain\Post;


use Carbon\Carbon;
use Shared\Model\Domain\Common\Slug;

class Post
{
    /** @var int */
    private $id;

    /** @var int */
    private $categoryId;

    /** @var string */
    private $name;

    /** @var  \Shared\Model\Domain\Common\Slug */
    private $slug;

    /** @var string */
    private $content;

    /** @var \Carbon\Carbon */
    private $createDate;

    /**
     * @param int $categoryId
     * @param string $name
     * @param \Shared\Model\Domain\Common\Slug $slug
     * @param string $content
     * @param \Carbon\Carbon $createDate
     */
    public function __construct(
        $categoryId,
        $name,
        Slug $slug,
        $content,
        Carbon $createDate
    ) {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->slug = $slug;
        $this->content = $content;
        $this->createDate = $createDate;
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
    public function getCategoryId()
    {
        return $this->categoryId;
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }
}