<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Lookups\V1;

use Twilio\Options;
use Twilio\Values;

abstract class PhoneNumberOptions {
    /**
     * @param string $countryCode The ISO country code of the phone number
     * @param string $type The type of information to return
     * @param string $addOns The unique_name of an Add-on you would like to invoke
     * @param string $addOnsData Data specific to the add-on you would like to
     *                           invoke
     * @return FetchPhoneNumberOptions Options builder
     */
    public static function fetch($countryCode = Values::NONE, $type = Values::NONE, $addOns = Values::NONE, $addOnsData = Values::NONE) {
        return new FetchPhoneNumberOptions($countryCode, $type, $addOns, $addOnsData);
    }
}

class FetchPhoneNumberOptions extends Options {
    /**
     * @param string $countryCode The ISO country code of the phone number
     * @param string $type The type of information to return
     * @param string $addOns The unique_name of an Add-on you would like to invoke
     * @param string $addOnsData Data specific to the add-on you would like to
     *                           invoke
     */
    public function __construct($countryCode = Values::NONE, $type = Values::NONE, $addOns = Values::NONE, $addOnsData = Values::NONE) {
        $this->options['countryCode'] = $countryCode;
        $this->options['type'] = $type;
        $this->options['addOns'] = $addOns;
        $this->options['addOnsData'] = $addOnsData;
    }

    /**
     * The [ISO country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the phone number to fetch. This is used to specify the country when the phone number is provided in a national format.
     *
     * @param string $countryCode The ISO country code of the phone number
     * @return $this Fluent Builder
     */
    public function setCountryCode($countryCode) {
        $this->options['countryCode'] = $countryCode;
        return $this;
    }

    /**
     * The type of information to return. Can be: `carrier` or `caller-name`. The default is null.  Carrier information costs $0.005 per phone number looked up.  Caller Name information is currently available only in the US and costs $0.01 per phone number looked up.  To retrieve both types on information, specify this parameter twice; once with `carrier` and once with `caller-name` as the value.
     *
     * @param string $type The type of information to return
     * @return $this Fluent Builder
     */
    public function setType($type) {
        $this->options['type'] = $type;
        return $this;
    }

    /**
     * The `unique_name` of an Add-on you would like to invoke. Can be the `unique_name` of an Add-on that is installed on your account. You can specify multiple instances of this parameter to invoke multiple Add-ons. For more information about  Add-ons, see the [Add-ons documentation](https://www.twilio.com/docs/add-ons).
     *
     * @param string $addOns The unique_name of an Add-on you would like to invoke
     * @return $this Fluent Builder
     */
    public function setAddOns($addOns) {
        $this->options['addOns'] = $addOns;
        return $this;
    }

    /**
     * Data specific to the add-on you would like to invoke. The content and format of this value depends on the add-on.
     *
     * @param string $addOnsData Data specific to the add-on you would like to
     *                           invoke
     * @return $this Fluent Builder
     */
    public function setAddOnsData($addOnsData) {
        $this->options['addOnsData'] = $addOnsData;
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
        return '[Twilio.Lookups.V1.FetchPhoneNumberOptions ' . implode(' ', $options) . ']';
    }
}