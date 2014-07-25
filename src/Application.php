<?php

namespace NetworkMonitor;

use Pimple\Container;

/**
 * Application Class
 */
class Application
{

    /**
     * @var Dependency Container
     */
    private $_contanier;

    /**
     * Initialize the Application
     *
     * @param string|resource|array $config Configuration options
     */
    public function __construct($config = null)
    {
        $this->_container = new Container();
    }


}