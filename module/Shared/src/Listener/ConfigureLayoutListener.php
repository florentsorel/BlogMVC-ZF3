<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\Listener;


use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Router\RouteMatch;
use Zend\ServiceManager\ServiceManager;

class ConfigureLayoutListener extends AbstractListenerAggregate
{
    /** @var  \Zend\ServiceManager\ServiceManager */
    private $serviceManager;

    /** @var bool */
    private $isLayoutConfigured;

    /** @var \Shared\Model\Infrastructure\Authentication\Identity */
    private $identity;

    /**
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        $this->isLayoutConfigured = false;
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_DISPATCH,
            [$this, 'initializeLayout']
        );

        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_DISPATCH_ERROR,
            [$this, 'initializeLayout'],
            $priority
        );
    }

    /**
     * @param \Zend\Mvc\MvcEvent $event
     */
    public function initializeLayout(MvcEvent $event)
    {
        // Prevents the layout from being configured multiple times.
        // This can occur after MvcEvent::EVENT_DISPATCH_ERROR
        // is triggered after MvcEvent::EVENT_DISPATCH
        if($this->isLayoutConfigured === true) {
            return;
        }

        $this->isLayoutConfigured = true;

        // Get logged user
        $this->identity = $this->serviceManager
            ->get(\Zend\Authentication\AuthenticationService::class)
            ->getIdentity();

        if ($event->getRouteMatch() instanceof RouteMatch === false) {
            $this->configureApplicationLayout($event);
            return;
        }

        $routeParts = explode('/', $event->getRouteMatch()->getMatchedRouteName());
        if ($routeParts[0] === 'admin') {
            $this->configureAdminLayout($event);
        } else {
            $this->configureApplicationLayout($event);
        }
    }

    /**
     * @param \Zend\Mvc\MvcEvent $event
     */
    private function configureApplicationLayout(MvcEvent $event)
    {
        $layoutViewModel = $event->getViewModel();
        $layoutViewModel->setTemplate('layout/application');
        $layoutViewModel->setVariable('identity', $this->identity);

        $viewHelperManager = $this->serviceManager->get('ViewHelperManager');

        $viewHelperManager->get('headLink')
            ->headLink([
                'rel' => 'favicon',
                'href' => '/favicon.ico',
            ])
            ->appendStylesheet('/css/bootstrap.min.css')
            ->appendStylesheet('/css/style.css');

        $viewHelperManager->get('headTitle')
            ->setSeparator(' - ')
            ->append('BlogMVC')
            ->setAutoEscape(false);
    }

    /**
     * @param \Zend\Mvc\MvcEvent $event
     */
    private function configureAdminLayout(MvcEvent $event)
    {
        $layoutViewModel = $event->getViewModel();
        $layoutViewModel->setTemplate('layout/admin');
        $layoutViewModel->setVariable('identity', $this->identity);

        $viewHelperManager = $this->serviceManager->get('ViewHelperManager');

        $viewHelperManager->get('headLink')
            ->appendStylesheet('/css/bootstrap.min.css')
            ->appendStylesheet('/css/bootstrap-theme.min.css');

        $viewHelperManager->get('headTitle')
            ->setSeparator(' - ')
            ->append('Admin BlogMVC')
            ->setAutoEscape(false);
    }
}