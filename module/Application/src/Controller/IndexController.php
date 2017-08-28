<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Application\Controller;

use Application\Model\Application\Query\Post\ListPost;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /** @var \Zend\ServiceManager\ServiceManager */
    private $serviceManager;

    /**
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var \Application\Model\Application\Query\Post\ListPostResponse $postResponse */
        $postResponse = $this->serviceManager
            ->get(ListPost::class)
            ->handle();

        return new ViewModel([
            'posts' => $postResponse->getPosts()
        ]);
    }
}
