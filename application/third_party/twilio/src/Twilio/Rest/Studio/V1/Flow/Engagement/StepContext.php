<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Studio\V1\Flow\Engagement;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextList $stepContext
 * @method \Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextContext stepContext()
 */
class StepContext extends InstanceContext {
    protected $_stepContext = null;

    /**
     * Initialize the StepContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     * @param string $engagementSid The SID of the Engagement
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\StepContext
     */
    public function __construct(Version $version, $flowSid, $engagementSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('flowSid' => $flowSid, 'engagementSid' => $engagementSid, 'sid' => $sid, );

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Engagements/' . rawurlencode($engagementSid) . '/Steps/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a StepInstance
     *
     * @return StepInstance Fetched StepInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new StepInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['engagementSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the stepContext
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextList
     */
    protected function getStepContext() {
        if (!$this->_stepContext) {
            $this->_stepContext = new StepContextList(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['engagementSid'],
                $this->solution['sid']
            );
        }

        return $this->_stepContext;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Studio.V1.StepContext ' . implode(' ', $context) . ']';
    }
}