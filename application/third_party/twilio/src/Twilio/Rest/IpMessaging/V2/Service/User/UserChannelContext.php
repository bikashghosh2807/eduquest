<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\IpMessaging\V2\Service\User;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class UserChannelContext extends InstanceContext {
    /**
     * Initialize the UserChannelContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the User Channel
     *                           resource from
     * @param string $userSid The SID of the User to fetch the User Channel
     *                        resource from
     * @param string $channelSid The SID of the Channel that has the User Channel
     *                           to fetch
     * @return \Twilio\Rest\IpMessaging\V2\Service\User\UserChannelContext
     */
    public function __construct(Version $version, $serviceSid, $userSid, $channelSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
            'userSid' => $userSid,
            'channelSid' => $channelSid,
        );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Users/' . rawurlencode($userSid) . '/Channels/' . rawurlencode($channelSid) . '';
    }

    /**
     * Fetch a UserChannelInstance
     *
     * @return UserChannelInstance Fetched UserChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new UserChannelInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['userSid'],
            $this->solution['channelSid']
        );
    }

    /**
     * Update the UserChannelInstance
     *
     * @param string $notificationLevel The push notification level to assign to
     *                                  the User Channel
     * @return UserChannelInstance Updated UserChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($notificationLevel) {
        $data = Values::of(array('NotificationLevel' => $notificationLevel, ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new UserChannelInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['userSid'],
            $this->solution['channelSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.IpMessaging.V2.UserChannelContext ' . implode(' ', $context) . ']';
    }
}