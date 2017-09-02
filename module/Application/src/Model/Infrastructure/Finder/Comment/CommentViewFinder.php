<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\Finder\Comment;


use Application\Model\Infrastructure\View\Post\CommentView;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Shared\Model\Domain\Common\Email;
use Zend\Db\Adapter\Adapter;

class CommentViewFinder
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
     * @param int $postId
     * @return \Illuminate\Support\Collection
     */
    public function findAllByPostId($postId)
    {
        $select = <<<SQL
            SELECT
                `Comment`.*
            FROM `Comment`
            WHERE `Comment`.idPost = :idPost
            ORDER BY `Comment`.creationDate DESC
SQL;

        $statement = $this->db->createStatement($select);
        $queryResult = $statement->execute([
            'idPost' => $postId
        ]);

        $collection = new Collection();

        if ($queryResult->isQueryResult() === false
            || $queryResult->count() < 1
        ) {
            return $collection;
        }

        foreach($queryResult as $row) {
            $collection->push(
                $this->createCommentView($row)
            );
        }

        return $collection;
    }

    /**
     * @param array $data
     * @return \Application\Model\Infrastructure\View\Post\CommentView
     */
    private function createCommentView(array $data)
    {
        $creationDate = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $data['creationDate']
        );

        return new CommentView(
            (int)$data['idComment'],
            $data['username'],
            new Email($data['email']),
            $data['content'],
            $creationDate
        );
    }
}