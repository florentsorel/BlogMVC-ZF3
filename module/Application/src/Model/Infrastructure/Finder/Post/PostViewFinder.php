<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\Finder\Post;


use Application\Model\Infrastructure\View\Post\PostView;
use Carbon\Carbon;
use Shared\Model\Domain\Common\Slug;
use Zend\Db\Adapter\Adapter;

class PostViewFinder
{
    /** @var \Zend\Db\Adapter\Adapter */
    private $db;

    /**
     * @param \Zend\Db\Adapter\Adapter $db
     */
    public function __construct(Adapter $db)
    {
        $this->db = $db;
    }

    /**
     * @param \Shared\Model\Domain\Common\Slug $slug
     * @return \Application\Model\Infrastructure\View\Post\PostView|null
     */
    public function findBySlug(Slug $slug)
    {
        $sql = <<<SQL
            SELECT
                `Post`.*,
                `User`.`username` as `author`,
                `Category`.name as `category`,
                `Category`.slug as `categorySlug`
            FROM `Post`
            INNER JOIN `User`
                ON `User`.idUser = `Post`.idUser
            INNER JOIN `Category`
                ON `Category`.idCategory = `Post`.idCategory
            WHERE `Post`.slug = :slug
            LIMIT 1
SQL;

        $statement = $this->db->createStatement($sql);
        $queryResult = $statement->execute([
            'slug' => $slug->toString()
        ]);

        if ($queryResult->isQueryResult() === false
            || $queryResult->count() < 1
        ) {
            return null;
        }

        return $this->createPostView($queryResult->current());
    }

    /**
     * @param array $data
     * @return \Application\Model\Infrastructure\View\Post\PostView
     */
    private function createPostView(array $data)
    {
        $creationDate = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $data['creationDate']
        );

        $postView = new PostView(
            (int)$data['idPost'],
            (int)$data['idUser'],
            $data['author'],
            $data['name'],
            $data['category'],
            Slug::createFromString($data['categorySlug']),
            $data['content'],
            $creationDate
        );

        return $postView;
    }
}