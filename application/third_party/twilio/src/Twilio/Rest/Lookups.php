<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Lookups\V1;

/**
 * @property \Twilio\Rest\Lookups\V1 $v1
 * @property \Twilio\Rest\Lookups\V1\PhoneNumberList $phoneNumbers
 * @method \Twilio\Rest\Lookups\V1\PhoneNumberContext phoneNumbers(string $phoneNumber)
 */
class Lookups extends Domain {
    protected $_v1 = null;

    /**
     * Construct the Lookups Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Lookups Domain for Lookups
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://lookups.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Lookups\V1 Version v1 of lookups
     */
    protected function getV1() {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $method = 'context' . ucfirst($name);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    /**
     * @return \Twilio\Rest\Lookups\V1\PhoneNumberList
     */
    protected function getPhoneNumbers() {
        return $this->v1->phoneNumbers;
    }

    /**
     * @param string $phoneNumber The phone number to fetch in E.164 format
     * @return \Twilio\Rest\Lookups\V1\PhoneNumberContext
     */
    protected function contextPhoneNumbers($phoneNumber) {
        return $this->v1->phoneNumbers($phoneNumber);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Lookups]';
    }
}