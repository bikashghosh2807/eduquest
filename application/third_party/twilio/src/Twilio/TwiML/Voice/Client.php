<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Client extends TwiML {
    /**
     * Client constructor.
     *
     * @param string $identity Client identity
     * @param array $attributes Optional attributes
     */
    public function __construct($identity = null, $attributes = array()) {
        parent::__construct('Client', $identity, $attributes);
    }

    /**
     * Add Identity child.
     *
     * @param string $clientIdentity Identity of the client to dial
     * @return Identity Child element.
     */
    public function identity($clientIdentity) {
        return $this->nest(new Identity($clientIdentity));
    }

    /**
     * Add Parameter child.
     *
     * @param array $attributes Optional attributes
     * @return Parameter Child element.
     */
    public function parameter($attributes = array()) {
        return $this->nest(new Parameter($attributes));
    }

    /**
     * Add Url attribute.
     *
     * @param string $url Client URL
     * @return static $this.
     */
    public function setUrl($url) {
        return $this->setAttribute('url', $url);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Client URL Method
     * @return static $this.
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add StatusCallbackEvent attribute.
     *
     * @param string $statusCallbackEvent Events to trigger status callback
     * @return static $this.
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        return $this->setAttribute('statusCallbackEvent', $statusCallbackEvent);
    }

    /**
     * Add StatusCallback attribute.
     *
     * @param string $statusCallback Status Callback URL
     * @return static $this.
     */
    public function setStatusCallback($statusCallback) {
        return $this->setAttribute('statusCallback', $statusCallback);
    }

    /**
     * Add StatusCallbackMethod attribute.
     *
     * @param string $statusCallbackMethod Status Callback URL Method
     * @return static $this.
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        return $this->setAttribute('statusCallbackMethod', $statusCallbackMethod);
    }
}