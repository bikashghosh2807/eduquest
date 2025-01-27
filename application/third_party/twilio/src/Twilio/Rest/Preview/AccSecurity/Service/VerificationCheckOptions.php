<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class VerificationCheckOptions {
    /**
     * @param string $to To phonenumber
     * @return CreateVerificationCheckOptions Options builder
     */
    public static function create($to = Values::NONE) {
        return new CreateVerificationCheckOptions($to);
    }
}

class CreateVerificationCheckOptions extends Options {
    /**
     * @param string $to To phonenumber
     */
    public function __construct($to = Values::NONE) {
        $this->options['to'] = $to;
    }

    /**
     * The To phonenumber of the phone being verified
     *
     * @param string $to To phonenumber
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Preview.AccSecurity.CreateVerificationCheckOptions ' . implode(' ', $options) . ']';
    }
}