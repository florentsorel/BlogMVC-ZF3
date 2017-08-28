<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\Model\Domain\Post;


use Carbon\Carbon;
use Shared\Model\Domain\Common\Email;

class Comment
{
    /** @var int */
    private $id;

    /** @var int */
    private $postId;

    /** @var string */
    private $username;

    /** @var \Shared\Model\Domain\Common\Email */
    private $email;

    /** @var string */
    private $content;

    /** @var \Carbon\Carbon */
    private $creationDate;

    /**
     * @param int $postId
     * @param string $username
     * @param \Shared\Model\Domain\Common\Email $email
     * @param string $content
     * @param \Carbon\Carbon $creationDate
     */
    public function __construct(
        $postId,
        $username,
        Email $email,
        $content,
        Carbon $creationDate
    ) {
        $this->postId = $postId;
        $this->username = $username;
        $this->email = $email;
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
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return \Shared\Model\Domain\Common\Email
     */
    public function getEmail()
    {
        return $this->email;
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