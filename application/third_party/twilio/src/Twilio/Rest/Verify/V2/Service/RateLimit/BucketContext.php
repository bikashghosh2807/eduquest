<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Verify\V2\Service\RateLimit;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class BucketContext extends InstanceContext {
    /**
     * Initialize the BucketContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $rateLimitSid Rate Limit Sid.
     * @param string $sid A string that uniquely identifies this Bucket.
     * @return \Twilio\Rest\Verify\V2\Service\RateLimit\BucketContext
     */
    public function __construct(Version $version, $serviceSid, $rateLimitSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
            'rateLimitSid' => $rateLimitSid,
            'sid' => $sid,
        );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/RateLimits/' . rawurlencode($rateLimitSid) . '/Buckets/' . rawurlencode($sid) . '';
    }

    /**
     * Update the BucketInstance
     *
     * @param array|Options $options Optional Arguments
     * @return BucketInstance Updated BucketInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Max' => $options['max'], 'Interval' => $options['interval'], ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new BucketInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['rateLimitSid'],
            $this->solution['sid']
        );
    }

    /**
     * Fetch a BucketInstance
     *
     * @return BucketInstance Fetched BucketInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new BucketInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['rateLimitSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the BucketInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Verify.V2.BucketContext ' . implode(' ', $context) . ']';
    }
}