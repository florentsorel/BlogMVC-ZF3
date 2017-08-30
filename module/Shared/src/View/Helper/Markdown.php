<?php
/**
 * @package blog-mvc
 * @author Rtransat
 */

namespace Shared\View\Helper;


use Zend\View\Helper\AbstractHelper;

class Markdown extends AbstractHelper
{
    /**
     * @param string $text
     * @return string
     */
    public function __invoke($text)
    {
        if (empty($text)) {
            throw new \RuntimeException("Text must be provided.");
        }

        return (new \cebe\markdown\GithubMarkdown())->parse($text);
    }
}