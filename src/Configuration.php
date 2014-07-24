<?php


namespace NetworkMonitor;


/** Configuration Class **/
class Configuration
{

    /**
     * Private Data
     */
    private $_data;


    /**
     * Constructor
     *
     * @param array $data Configuration Data
     */
    public function __construct(array $data = [])
    {
        $this->_data = $data;
    }


    /**
     * Get Config Option
     *
     * @param string $option Option Name
     * 
     * @return mixed Config value
     * @throws Exception If the value does not exist
     */
    public function get($option)
    {
        if (!array_key_exists($option, $this->_data)) {
            throw new Exception("Option {$option} not found");
        }

        return $this->_data[$option];

    }


    /**
     * Set a config option
     *
     * @param string $option Option Key
     * @param mixed  $value  Option Value
     *
     * @return void
     */
    public function set($option, $value)
    {
        $this->_data[$option] = $value;
    }



}