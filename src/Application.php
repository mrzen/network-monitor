<?php

namespace NetworkMonitor;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Application Class
 */
class Application
{

    /**
     * @var Configuration
     */
    private $_configuration;
    
    /**
     * @var Monolog Logger
     */
    private $_log;

    /**
     * Initialize the Application
     *
     * @param string|resource|array $config Configuration options
     */
    public function __construct($config = null)
    {
        $this->_getConfig($config);

        $this->_log = new Logger('NetworkMonitor');
        
        if ($config['debug']) {
            $this->_stdout = new StreamHandler(STDOUT, Logger::DEBUG);
            $this->_log->pushHandler($this->_stdout);
        }

        $this->_log->addNotice("Application Starting");
    }


    /**
     * Gets the Configuration
     *
     * @param string|resource|array $config Configuration options
     */
    private function _getConfig($config)
    {
        if ( is_array($config) ) {
            $this->_configuration = new Configuration($config);
        }

        if ( is_string($config) ) {
            if ( file_exists( $config ) ) {
                $this->_configuration = new Configuration(json_decode(file_get_contents($config)));
            } else {
                $this->_configuration = new Configuration(json_decode($config));
            }
        }

        return;
    }

}