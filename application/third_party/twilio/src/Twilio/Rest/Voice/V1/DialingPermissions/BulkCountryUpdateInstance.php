<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Voice\V1\DialingPermissions;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property int $updateCount
 * @property string $updateRequest
 */
class BulkCountryUpdateInstance extends InstanceResource {
    /**
     * Initialize the BulkCountryUpdateInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @return \Twilio\Rest\Voice\V1\DialingPermissions\BulkCountryUpdateInstance
     */
    public function __construct(Version $version, array $payload) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'updateCount' => Values::array_get($payload, 'update_count'),
            'updateRequest' => Values::array_get($payload, 'update_request'),
        );

        $this->solution = array();
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
        return '[Twilio.Voice.V1.BulkCountryUpdateInstance]';
    }
}