<?php
namespace Phalcon\Assets\Filters;

use \Phalcon\Assets\FilterInterface;

/**
 * Compile LESS to CSS
 *
 * @param string $contents
 * @return string
 */
class Less implements FilterInterface
{
    protected $_options;

    /**
     * CssLess constructor
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
        if(isset($this->_options['directory']))
        {
            $less->addImportDir( $this->_options['directory'] );
        }
        return $less->compile($contents);
    }
}