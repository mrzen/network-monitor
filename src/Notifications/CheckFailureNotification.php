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

namespace NetworkMonitor\Notifications;

use NetworkMonitor\Serivices\Check\CheckInterface;

/**
 * Check Failure Notification
 *
 * Class for a notification of a failed check.
 */
class CheckFailureNotification implements NotificationInterface
{

    /**
     * @var CheckInterface Failed check
     */
    private $_check;

    /**
     * Create the Notification
     *
     * @param CheckInterface $check The check which failed
     *
     */
    public function __construct(CheckInterface $check)
    {
        $this->_check = $check;
    }


    /**
     * Get Notification Title
     *
     * @return string Notification Title
     */
    public function getTitle()
    {
        return "Check Failed: " . $this->_check->getName();
    }


    /**
     * Get Notification Text
     *
     * @return string Notification Body Text
     */
    public function getText()
    {
        return "The check {$this->_check->getName()} failed with the reason: {$this->_check->getMessage()}";
    }

    /**
     * Get the Notification Context
     *
     * @return CheckInterface Failed check
     */
    public function getContext()
    {
        return $this->_check;
    }

}