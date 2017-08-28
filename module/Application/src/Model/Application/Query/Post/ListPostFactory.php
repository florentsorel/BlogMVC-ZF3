<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Application\Model\Infrastructure\Finder\Post\PostListItemViewFinder;
use Zend\ServiceManager\Factory\FactoryInterface;

class ListPostFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return \Application\Model\Application\Query\Post\ListPost
     */
    public function __invoke(
        \Interop\Container\ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new ListPost(
            $container->get(PostListItemViewFinder::class)
        );
    }
}