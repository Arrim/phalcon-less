<?php
namespace Phalcon\Assets\Filters;

use \Phalcon\Assets\FilterInterface;

/**
 * Filters CSS content using YUI
 *
 * @param string $contents
 * @return string
 */
class Less implements FilterInterface
{
    protected $_options;

    /**
     * CssYUICompressor constructor
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->_options = $options;
    }

    /**
     * Do the filtering
     *
     * @param string $contents
     *
     * @return string
     */
    public function filter($contents)
    {
        $less = new \lessc();
        $less->parse($contents);
        return $less->getCss();
    }
}