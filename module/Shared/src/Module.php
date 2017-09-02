<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared;

use Shared\Listener\ConfigureLayoutListener;
use Zend\EventManager\EventInterface;
use Zend\I18n\View\Helper\Plural;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements
    ConfigProviderInterface,
    ServiceProviderInterface,
    ViewHelperProviderInterface,
    BootstrapListenerInterface
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
    public function getViewHelperConfig()
    {
        return include __DIR__ . '/../config/view-helpers.config.php';
    }

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $event
     * @return array
     */
    public function onBootstrap(EventInterface $event)
    {
        $eventManager = $event->getApplication()->getEventManager();
        $serviceManager = $event->getApplication()->getServiceManager();

        $configureLayoutListener = new ConfigureLayoutListener($serviceManager);
        $configureLayoutListener->attach($eventManager, 2);

        /** @var \Zend\I18n\View\Helper\Plural $pluralViewHelper */
        $pluralViewHelper = $serviceManager
            ->get('ViewHelperManager')
            ->get(Plural::class);
        $pluralViewHelper->setPluralRule('nplurals=2; plural=(n==0 || n==1 ? 0 : 1)');

    }
}