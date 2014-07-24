<?php

namespace NetworkMonitor\Checks;

/**
 * Ping Check
 *
 * Checks that N out of M pings are successful in under T ms
 */
class PingCheck implements CheckInterface
{

    /**
     * Success
     */
    private $_success;

    /**
     * Run the ping test
     *
     * Configuration Options:
     *
     *  - `host`    : Host IP or hostname
     *  - `pings`   : Number of pings to send (>0)
     *  - `timeout` : A timeout (in milliseconds) before the check fails
     *
     */
    public function run(array $config = [])
    {
        $host = gethostbyname($config['host']);
        $pings = (int)$config['pings'];
        
        $timeout = (float)$config['timeout'];
        
        // Run the Ping N times
        for ($i = 0; $i < $pings; $i++) {
            
        }

        
    }


    /**
     * Get check success
     *
     * @see CheckInterface
     */
    public function getSuccess()
    {
        return $this->_success;
    }
}
