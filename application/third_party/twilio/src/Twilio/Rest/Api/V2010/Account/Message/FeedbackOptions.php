<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Message;

use Twilio\Options;
use Twilio\Values;

abstract class FeedbackOptions {
    /**
     * @param string $outcome Whether the feedback has arrived
     * @return CreateFeedbackOptions Options builder
     */
    public static function create($outcome = Values::NONE) {
        return new CreateFeedbackOptions($outcome);
    }
}

class CreateFeedbackOptions extends Options {
    /**
     * @param string $outcome Whether the feedback has arrived
     */
    public function __construct($outcome = Values::NONE) {
        $this->options['outcome'] = $outcome;
    }

    /**
     * Whether the feedback has arrived. Can be: `unconfirmed` or `confirmed`. If `provide_feedback`=`true` in [the initial HTTP POST](https://www.twilio.com/docs/sms/api/message-resource#create-a-message-resource), the initial value of this property is `unconfirmed`. After the message arrives, update the value to `confirmed`.
     *
     * @param string $outcome Whether the feedback has arrived
     * @return $this Fluent Builder
     */
    public function setOutcome($outcome) {
        $this->options['outcome'] = $outcome;
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
        return '[Twilio.Api.V2010.CreateFeedbackOptions ' . implode(' ', $options) . ']';
    }
}