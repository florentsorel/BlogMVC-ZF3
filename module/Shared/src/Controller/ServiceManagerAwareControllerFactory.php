<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\Controller;


use Zend\ServiceManager\Factory\FactoryInterface;

class ServiceManagerAwareControllerFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(
        \Interop\Container\ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        return new $requestedName($container);
    }
}