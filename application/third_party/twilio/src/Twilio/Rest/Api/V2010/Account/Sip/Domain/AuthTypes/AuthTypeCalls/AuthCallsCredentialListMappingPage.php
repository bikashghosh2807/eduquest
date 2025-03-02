<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCalls;

use Twilio\Page;

class AuthCallsCredentialListMappingPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new AuthCallsCredentialListMappingInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['domainSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.AuthCallsCredentialListMappingPage]';
    }
}