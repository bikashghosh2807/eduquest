<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Video\V1\Room\Participant;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class SubscribeRulesList extends ListResource {
    /**
     * Construct the SubscribeRulesList
     *
     * @param Version $version Version that contains the resource
     * @param string $roomSid The SID of the Room resource for the Subscribe Rules
     * @param string $participantSid The SID of the Participant resource for the
     *                               Subscribe Rules
     * @return \Twilio\Rest\Video\V1\Room\Participant\SubscribeRulesList
     */
    public function __construct(Version $version, $roomSid, $participantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('roomSid' => $roomSid, 'participantSid' => $participantSid, );

        $this->uri = '/Rooms/' . rawurlencode($roomSid) . '/Participants/' . rawurlencode($participantSid) . '/SubscribeRules';
    }

    /**
     * Fetch a SubscribeRulesInstance
     *
     * @return SubscribeRulesInstance Fetched SubscribeRulesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SubscribeRulesInstance(
            $this->version,
            $payload,
            $this->solution['roomSid'],
            $this->solution['participantSid']
        );
    }

    /**
     * Update the SubscribeRulesInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SubscribeRulesInstance Updated SubscribeRulesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Rules' => Serialize::jsonObject($options['rules']), ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SubscribeRulesInstance(
            $this->version,
            $payload,
            $this->solution['roomSid'],
            $this->solution['participantSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Video.V1.SubscribeRulesList]';
    }
}