<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\Finder\Post;


use Application\Model\Infrastructure\View\Post\PostListItemView;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Shared\Model\Domain\Common\Slug;
use Zend\Db\Adapter\Adapter;

class PostListItemViewFinder
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
     * @return \Illuminate\Support\Collection
     */
    public function findAll()
    {
        $select = <<<SQL
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
            ORDER BY `Post`.creationDate DESC
SQL;

        $statement = $this->db->createStatement($select);
        $queryResult = $statement->execute();

        $collection = new Collection();

        if ($queryResult->isQueryResult() === false
            && $queryResult->count() < 1
        ) {
            return $collection;
        }

        foreach($queryResult as $row) {
            $collection->push(
                $this->createPostListItemView($row)
            );
        }

        return $collection;
    }

    /**
     * @param array $data
     * @return \Application\Model\Infrastructure\View\Post\PostListItemView
     */
    private function createPostListItemView(array $data)
    {
        $creationDate = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $data['creationDate']
        );

        $postView = new PostListItemView(
            (int)$data['idPost'],
            (int)$data['idUser'],
            $data['author'],
            $data['name'],
            Slug::createFromString($data['slug']),
            $data['category'],
            Slug::createFromString($data['categorySlug']),
            $data['content'],
            $creationDate
        );

        return $postView;
    }
}