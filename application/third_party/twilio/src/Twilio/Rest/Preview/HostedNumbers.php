<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentList;
use Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentList $authorizationDocuments
 * @property \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderList $hostedNumberOrders
 * @method \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentContext authorizationDocuments(string $sid)
 * @method \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderContext hostedNumberOrders(string $sid)
 */
class HostedNumbers extends Version {
    protected $_authorizationDocuments = null;
    protected $_hostedNumberOrders = null;

    /**
     * Construct the HostedNumbers version of Preview
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\HostedNumbers HostedNumbers version of Preview
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'HostedNumbers';
    }

    /**
     * @return \Twilio\Rest\Preview\HostedNumbers\AuthorizationDocumentList
     */
    protected function getAuthorizationDocuments() {
        if (!$this->_authorizationDocuments) {
            $this->_authorizationDocuments = new AuthorizationDocumentList($this);
        }
        return $this->_authorizationDocuments;
    }

    /**
     * @return \Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderList
     */
    protected function getHostedNumberOrders() {
        if (!$this->_hostedNumberOrders) {
            $this->_hostedNumberOrders = new HostedNumberOrderList($this);
        }
        return $this->_hostedNumberOrders;
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
        return '[Twilio.Preview.HostedNumbers]';
    }
}