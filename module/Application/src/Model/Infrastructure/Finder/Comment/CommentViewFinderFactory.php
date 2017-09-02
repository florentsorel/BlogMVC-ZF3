<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Model\Infrastructure\Finder\Comment;


use Zend\ServiceManager\Factory\FactoryInterface;

class CommentViewFinderFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return \Application\Model\Infrastructure\Finder\Comment\CommentViewFinder
     */
    public function __invoke(
        \Interop\Container\ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new CommentViewFinder($container->get('db'));
    }
}