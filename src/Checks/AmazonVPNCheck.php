<?php


namespace NetworkMonitor\Checks;


/**
 * Check an Amazon Web Services VPN Connection from a VPC
 *
 * Will succeed if at least one tunnel is up
 */
class AmazonVPNCheck implements CheckInterface
{

    /**
     * @var Success of the check
     */
    private $_success;

    public function run(array $config = [])
    {
        
    }


    public function getSuccess()
    {
        return $this->_success;
    }


}
