<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $serviceSid
 * @property string $accountSid
 * @property string $to
 * @property string $channel
 * @property string $status
 * @property bool $valid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 */
class VerificationInstance extends InstanceResource {
    /**
     * Initialize the VerificationInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Service Sid.
     * @return \Twilio\Rest\Preview\AccSecurity\Service\VerificationInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'to' => Values::array_get($payload, 'to'),
            'channel' => Values::array_get($payload, 'channel'),
            'status' => Values::array_get($payload, 'status'),
            'valid' => Values::array_get($payload, 'valid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
        );

        $this->solution = array('serviceSid' => $serviceSid, );
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.AccSecurity.VerificationInstance]';
    }
}