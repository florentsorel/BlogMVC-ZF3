<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\Finder\Post;


use Zend\ServiceManager\Factory\FactoryInterface;

class PostListItemViewFinderFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return \Application\Model\Infrastructure\Finder\Post\PostListItemViewFinder
     */
    public function __invoke(
        \Interop\Container\ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new PostListItemViewFinder(
            $container->get('db')
        );
    }
}