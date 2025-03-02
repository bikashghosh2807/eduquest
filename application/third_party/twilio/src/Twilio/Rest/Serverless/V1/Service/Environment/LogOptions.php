<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class LogOptions {
    /**
     * @param string $functionSid The SID of the function whose invocation produced
     *                            the Log resources to read
     * @return ReadLogOptions Options builder
     */
    public static function read($functionSid = Values::NONE) {
        return new ReadLogOptions($functionSid);
    }
}

class ReadLogOptions extends Options {
    /**
     * @param string $functionSid The SID of the function whose invocation produced
     *                            the Log resources to read
     */
    public function __construct($functionSid = Values::NONE) {
        $this->options['functionSid'] = $functionSid;
    }

    /**
     * The SID of the function whose invocation produced the Log resources to read.
     *
     * @param string $functionSid The SID of the function whose invocation produced
     *                            the Log resources to read
     * @return $this Fluent Builder
     */
    public function setFunctionSid($functionSid) {
        $this->options['functionSid'] = $functionSid;
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
        return '[Twilio.Serverless.V1.ReadLogOptions ' . implode(' ', $options) . ']';
    }
}