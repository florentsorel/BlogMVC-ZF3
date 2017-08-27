<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\View\Helper;


use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Zend\View\Helper\AbstractHelper;

class FlashMessages extends AbstractHelper
{
    /**
     * @var \Zend\Mvc\Plugin\FlashMessenger\FlashMessenger
     */
    private $flashMessenger;

    /**
     * @param \Zend\Mvc\Plugin\FlashMessenger\FlashMessenger $flashMessenger
     */
    public function __construct(FlashMessenger $flashMessenger)
    {
        $this->flashMessenger = $flashMessenger;
    }

    /**
     * @param string $namespace
     * @return string
     */
    public function get($namespace = FlashMessenger::NAMESPACE_DEFAULT)
    {
        if ($this->flashMessenger->hasCurrentMessages($namespace) === false) {
            return '';
        }

        switch ($namespace) {
            case FlashMessenger::NAMESPACE_WARNING:
                $type = 'warning';
                break;
            case FlashMessenger::NAMESPACE_INFO:
                $type = 'info';
                break;
            case FlashMessenger::NAMESPACE_ERROR:
                $type = 'danger';
                break;
            case FlashMessenger::NAMESPACE_SUCCESS:
                $type = 'success';
                break;
            default:
                $type = 'default';
                break;
        }

        $html = '';

        foreach ($this->flashMessenger->getCurrentMessages($namespace) as $message) {
            $html .= '<div class="alert alert-'. $type .'">' . $message . '</div>';
        }

        return $html;
    }

    /**
     * @return string
     */
    public function getSuccessMessages()
    {
        return $this->get(FlashMessenger::NAMESPACE_SUCCESS);
    }

    /**
     * @return string
     */
    public function getErrorMessages()
    {
        return $this->get(FlashMessenger::NAMESPACE_ERROR);
    }

    /**
     * @return string
     */
    public function getInfoMessages()
    {
        return $this->get(FlashMessenger::NAMESPACE_INFO);
    }

    /**
     * @return string
     */
    public function getWarningMessages()
    {
        return $this->get(FlashMessenger::NAMESPACE_WARNING);
    }

    /**
     * @return string
     */
    public function getAllMessages()
    {
        return $this->getSuccessMessages()
            . $this->getErrorMessages()
            . $this->getInfoMessages()
            . $this->getWarningMessages();
    }
}