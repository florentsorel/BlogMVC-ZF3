<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Application\Query\Post;


use Application\Model\Infrastructure\Finder\Post\PostViewFinder;
use Zend\ServiceManager\Factory\FactoryInterface;

class FindPostFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return \Application\Model\Application\Query\Post\FindPost
     */
    public function __invoke(
        \Interop\Container\ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new FindPost(
            $container->get(PostViewFinder::class)
        );
    }
}