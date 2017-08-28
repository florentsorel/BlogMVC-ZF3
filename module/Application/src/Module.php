<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    ConfigProviderInterface,
    ServiceProviderInterface,
    ControllerProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/../config/services.config.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getControllerConfig()
    {
        return include __DIR__ . '/../config/controllers.config.php';
    }
}
