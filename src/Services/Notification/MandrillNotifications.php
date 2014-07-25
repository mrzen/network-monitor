<?php

/**
 * © 2014 Mr.Zen Ltd
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, US.A
 */

namespace NetworkMonitor\Services\Notification;

use NetworkMonitor\Notifications\NotificationInterface;

use Pimple\Container;
use Mandrill\Mandrill;

/**
 * Mandrill Notification Implementation
 */
class MandrillNotifcations implements NotificationServiceInterface
{

    /*
     * Service Parameters
     */

    /**
     * @var string Mandrill API Key
     */
    private $_api_key;


    /**
     * @var string E-mail from Name
     */
    private $_from_name;


    /**
     * @var string E-mail from address
     */
    private $_from_address;

    /**
     * @var string Mandrill IP Pool
     *      Defaults to 'Main Pool'
     */
    private $_ip_pool = 'Main Pool';


    /**
     * @var string Mandrill Template
     *      Defaults to `null`, e-mail will be sent as-is
     */
    private $_template = null;

    /**
     * @var Mandrill Client
     */
    private $_mandrill;
    

    /**
     * Register the Notification service
     *
     * @param Container $pimple Pimple Dependency Injection Container
     *
     * @return \void
     */
    public function register(Container $pimple)
    {
        
        $this->_api_key   = $pimple['mandrill_api_key'];
        $this->_from_name = $pimple['email_from_name'];
        $this->_from_address = $pimple['email_from_address'];
        
        if (array_key_exists('email_ip_pool', $pimple)) {
            $this->_ip_pool = $pimple['email_ip_pool'];
        }


        if (array_key_exists('email_template', $pimple)) {
            $this->_template = $pimple['email_template'];
        }

        $this->_mandrill = new Mandrill($this->_api_key);
        
        $pimple->registerServiceProvider($this);

    }


    /**
     * Send a Notification
     *
     * @return bool Notification Success
     */
    public function notify(NotificationInterface $notification)
    {
        if ($this->_template) {
            return $this->_sendTemplateEmail($notification);
        } else {
            return $this->_sendEmail($notification);
        }

    }

    /**
     * Send an e-mail using a Template
     *
     * @return bool Notification Success
     */
    private function _sendTemplateEmail(NotificationInterface $notification)
    {

    }


    /**
     * Send a plain e-mail
     *
     * @return bool Notification Success
     */
    private function _sendEmail(NotificationInterface $notification)
    {
        $message = [
            'text' => $notification->getText(),
            'subject' => $notification->getTitle(),
            'from_email' => $this->_from_email,
            'from_name' => $this->_from_name
        ];

        try {
            $result = $this->_mandrill->messages->send($message, false, $this->_ip_pool);
        } catch(Mandrill_Error $e) {
            return false;
        }
        
        return true;

    }

    
}