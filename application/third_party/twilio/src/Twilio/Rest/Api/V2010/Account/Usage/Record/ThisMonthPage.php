<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Usage\Record;

use Twilio\Page;

class ThisMonthPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new ThisMonthInstance($this->version, $payload, $this->solution['accountSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.ThisMonthPage]';
    }
}