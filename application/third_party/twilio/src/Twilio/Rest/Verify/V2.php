<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Verify\V2\ServiceList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Verify\V2\ServiceList $services
 * @method \Twilio\Rest\Verify\V2\ServiceContext services(string $sid)
 */
class V2 extends Version {
    protected $_services = null;

    /**
     * Construct the V2 version of Verify
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Verify\V2 V2 version of Verify
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v2';
    }

    /**
     * @return \Twilio\Rest\Verify\V2\ServiceList
     */
    protected function getServices() {
        if (!$this->_services) {
            $this->_services = new ServiceList($this);
        }
        return $this->_services;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
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
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Verify.V2]';
    }
}