<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Connect extends TwiML {
    /**
     * Connect constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Connect', null, $attributes);
    }

    /**
     * Add Room child.
     *
     * @param string $name Room name
     * @param array $attributes Optional attributes
     * @return Room Child element.
     */
    public function room($name, $attributes = array()) {
        return $this->nest(new Room($name, $attributes));
    }

    /**
     * Add Autopilot child.
     *
     * @param string $name Autopilot assistant sid or unique name
     * @return Autopilot Child element.
     */
    public function autopilot($name) {
        return $this->nest(new Autopilot($name));
    }

    /**
     * Add Stream child.
     *
     * @param array $attributes Optional attributes
     * @return Stream Child element.
     */
    public function stream($attributes = array()) {
        return $this->nest(new Stream($attributes));
    }

    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     * @return static $this.
     */
    public function setAction($action) {
        return $this->setAttribute('action', $action);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }
}