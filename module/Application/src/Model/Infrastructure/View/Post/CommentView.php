<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\View\Post;


use Carbon\Carbon;

class CommentView
{
    /** @var int */
    private $id;

    /** @var string */
    private $username;

    /** @var \Shared\Model\Domain\Common\Email */
    private $email;

    /** @var string */
    private $content;

    /** @var \Carbon\Carbon */
    private $creationDate;

    /**
     * @param int $id
     * @param string $username
     * @param \Shared\Model\Domain\Common\Email $email
     * @param string $content
     * @param \Carbon\Carbon $creationDate
     */
    public function __construct(
        $id,
        $username,
        \Shared\Model\Domain\Common\Email $email,
        $content,
        Carbon $creationDate
    ) {
        $this->id = $id;
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

    /**
     * @return string
     */
    public function getCreationDateToString()
    {
        $now = Carbon::now();
        if ($this->getCreationDate()->isSameDay($now)) {
            return $this->getCreationDate()->diffForHumans();
        }

        return $this->getCreationDate()->format('Y-m-d H:i:s');
    }

}