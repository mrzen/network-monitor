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


/**
 * Notification Interface
 *
 */
interface NotificationInterface
{

    /**
     * Get the notification title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the notification context
     *
     * @return object
     */
    public function getContext();


    /**
     * Get the notification body text
     *
     * @return string
     */
    public function getText();

}