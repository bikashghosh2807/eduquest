<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class VerificationCheckList extends ListResource {
    /**
     * Construct the VerificationCheckList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @return \Twilio\Rest\Preview\AccSecurity\Service\VerificationCheckList
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/VerificationCheck';
    }

    /**
     * Create a new VerificationCheckInstance
     *
     * @param string $code The verification string
     * @param array|Options $options Optional Arguments
     * @return VerificationCheckInstance Newly created VerificationCheckInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($code, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Code' => $code, 'To' => $options['to'], ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new VerificationCheckInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.AccSecurity.VerificationCheckList]';
    }
}