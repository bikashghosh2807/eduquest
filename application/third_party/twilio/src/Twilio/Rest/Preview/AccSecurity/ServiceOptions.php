<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Preview\AccSecurity;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ServiceOptions {
    /**
     * @param int $codeLength Length of verification code. Valid values are 4-10
     * @return CreateServiceOptions Options builder
     */
    public static function create($codeLength = Values::NONE) {
        return new CreateServiceOptions($codeLength);
    }

    /**
     * @param string $name Friendly name of the service
     * @param int $codeLength Length of verification code. Valid values are 4-10
     * @return UpdateServiceOptions Options builder
     */
    public static function update($name = Values::NONE, $codeLength = Values::NONE) {
        return new UpdateServiceOptions($name, $codeLength);
    }
}

class CreateServiceOptions extends Options {
    /**
     * @param int $codeLength Length of verification code. Valid values are 4-10
     */
    public function __construct($codeLength = Values::NONE) {
        $this->options['codeLength'] = $codeLength;
    }

    /**
     * The length of the verification code to be generated. Must be an integer value between 4-10
     *
     * @param int $codeLength Length of verification code. Valid values are 4-10
     * @return $this Fluent Builder
     */
    public function setCodeLength($codeLength) {
        $this->options['codeLength'] = $codeLength;
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
        return '[Twilio.Preview.AccSecurity.CreateServiceOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateServiceOptions extends Options {
    /**
     * @param string $name Friendly name of the service
     * @param int $codeLength Length of verification code. Valid values are 4-10
     */
    public function __construct($name = Values::NONE, $codeLength = Values::NONE) {
        $this->options['name'] = $name;
        $this->options['codeLength'] = $codeLength;
    }

    /**
     * A 1-64 character string with friendly name of service
     *
     * @param string $name Friendly name of the service
     * @return $this Fluent Builder
     */
    public function setName($name) {
        $this->options['name'] = $name;
        return $this;
    }

    /**
     * The length of the verification code to be generated. Must be an integer value between 4-10
     *
     * @param int $codeLength Length of verification code. Valid values are 4-10
     * @return $this Fluent Builder
     */
    public function setCodeLength($codeLength) {
        $this->options['codeLength'] = $codeLength;
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
        return '[Twilio.Preview.AccSecurity.UpdateServiceOptions ' . implode(' ', $options) . ']';
    }
}