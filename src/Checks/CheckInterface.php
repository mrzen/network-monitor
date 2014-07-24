<?php


namespace NetworkMonitor\Checks;

/**
 * Interface for a Network Check
 */
interface CheckInterface
{


    /**
     * Run the check
     *
     * @param array $config Check Configuration
     */
    public function run(array $config = []);
 
    /**
     * Get the success of the check
     *
     * @return bool Sucess
     */
    public function getSuccess();


}