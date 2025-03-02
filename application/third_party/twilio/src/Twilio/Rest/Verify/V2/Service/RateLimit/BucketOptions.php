<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify\V2\Service\RateLimit;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class BucketOptions {
    /**
     * @param int $max Max number of requests.
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     * @return UpdateBucketOptions Options builder
     */
    public static function update($max = Values::NONE, $interval = Values::NONE) {
        return new UpdateBucketOptions($max, $interval);
    }
}

class UpdateBucketOptions extends Options {
    /**
     * @param int $max Max number of requests.
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     */
    public function __construct($max = Values::NONE, $interval = Values::NONE) {
        $this->options['max'] = $max;
        $this->options['interval'] = $interval;
    }

    /**
     * Maximum number of requests permitted in during the interval.
     *
     * @param int $max Max number of requests.
     * @return $this Fluent Builder
     */
    public function setMax($max) {
        $this->options['max'] = $max;
        return $this;
    }

    /**
     * Number of seconds that the rate limit will be enforced over.
     *
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     * @return $this Fluent Builder
     */
    public function setInterval($interval) {
        $this->options['interval'] = $interval;
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
        return '[Twilio.Verify.V2.UpdateBucketOptions ' . implode(' ', $options) . ']';
    }
}