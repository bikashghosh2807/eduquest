<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Api\V2010\Account\Sip;

use Twilio\Options;
use Twilio\Values;

abstract class DomainOptions {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $voiceUrl The URL we should call when receiving a call
     * @param string $voiceMethod The HTTP method to use with voice_url
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 in executing TwiML
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @param string $voiceStatusCallbackUrl The URL that we should call to pass
     *                                       status updates
     * @param string $voiceStatusCallbackMethod The HTTP method we should use to
     *                                          call `voice_status_callback_url`
     * @param bool $sipRegistration Whether SIP registration is allowed
     * @return CreateDomainOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $sipRegistration = Values::NONE) {
        return new CreateDomainOptions($friendlyName, $voiceUrl, $voiceMethod, $voiceFallbackUrl, $voiceFallbackMethod, $voiceStatusCallbackUrl, $voiceStatusCallbackMethod, $sipRegistration);
    }

    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $voiceFallbackMethod The HTTP method used with
     *                                    voice_fallback_url
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 in executing TwiML
     * @param string $voiceMethod The HTTP method we should use with voice_url
     * @param string $voiceStatusCallbackMethod The HTTP method we should use to
     *                                          call voice_status_callback_url
     * @param string $voiceStatusCallbackUrl The URL that we should call to pass
     *                                       status updates
     * @param string $voiceUrl The URL we should call when receiving a call
     * @param bool $sipRegistration Whether SIP registration is allowed
     * @param string $domainName The unique address on Twilio to route SIP traffic
     * @return UpdateDomainOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceUrl = Values::NONE, $sipRegistration = Values::NONE, $domainName = Values::NONE) {
        return new UpdateDomainOptions($friendlyName, $voiceFallbackMethod, $voiceFallbackUrl, $voiceMethod, $voiceStatusCallbackMethod, $voiceStatusCallbackUrl, $voiceUrl, $sipRegistration, $domainName);
    }
}

class CreateDomainOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $voiceUrl The URL we should call when receiving a call
     * @param string $voiceMethod The HTTP method to use with voice_url
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 in executing TwiML
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @param string $voiceStatusCallbackUrl The URL that we should call to pass
     *                                       status updates
     * @param string $voiceStatusCallbackMethod The HTTP method we should use to
     *                                          call `voice_status_callback_url`
     * @param bool $sipRegistration Whether SIP registration is allowed
     */
    public function __construct($friendlyName = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $sipRegistration = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        $this->options['sipRegistration'] = $sipRegistration;
    }

    /**
     * A descriptive string that you created to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The URL we should when the domain receives a call.
     *
     * @param string $voiceUrl The URL we should call when receiving a call
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceMethod The HTTP method to use with voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs while retrieving or executing the TwiML from `voice_url`.
     *
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 in executing TwiML
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method to use with
     *                                    voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL that we should call to pass status parameters (such as call ended) to your application.
     *
     * @param string $voiceStatusCallbackUrl The URL that we should call to pass
     *                                       status updates
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackUrl($voiceStatusCallbackUrl) {
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_status_callback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceStatusCallbackMethod The HTTP method we should use to
     *                                          call `voice_status_callback_url`
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackMethod($voiceStatusCallbackMethod) {
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        return $this;
    }

    /**
     * Whether to allow SIP Endpoints to register with the domain to receive calls. Can be `true` or `false`. `true` allows SIP Endpoints to register with the domain to receive calls, `false` does not.
     *
     * @param bool $sipRegistration Whether SIP registration is allowed
     * @return $this Fluent Builder
     */
    public function setSipRegistration($sipRegistration) {
        $this->options['sipRegistration'] = $sipRegistration;
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
        return '[Twilio.Api.V2010.CreateDomainOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateDomainOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $voiceFallbackMethod The HTTP method used with
     *                                    voice_fallback_url
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 in executing TwiML
     * @param string $voiceMethod The HTTP method we should use with voice_url
     * @param string $voiceStatusCallbackMethod The HTTP method we should use to
     *                                          call voice_status_callback_url
     * @param string $voiceStatusCallbackUrl The URL that we should call to pass
     *                                       status updates
     * @param string $voiceUrl The URL we should call when receiving a call
     * @param bool $sipRegistration Whether SIP registration is allowed
     * @param string $domainName The unique address on Twilio to route SIP traffic
     */
    public function __construct($friendlyName = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceUrl = Values::NONE, $sipRegistration = Values::NONE, $domainName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['sipRegistration'] = $sipRegistration;
        $this->options['domainName'] = $domainName;
    }

    /**
     * A descriptive string that you created to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method used with
     *                                    voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs while retrieving or executing the TwiML requested by `voice_url`.
     *
     * @param string $voiceFallbackUrl The URL we should call when an error occurs
     *                                 in executing TwiML
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_url`
     *
     * @param string $voiceMethod The HTTP method we should use with voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_status_callback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceStatusCallbackMethod The HTTP method we should use to
     *                                          call voice_status_callback_url
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackMethod($voiceStatusCallbackMethod) {
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        return $this;
    }

    /**
     * The URL that we should call to pass status parameters (such as call ended) to your application.
     *
     * @param string $voiceStatusCallbackUrl The URL that we should call to pass
     *                                       status updates
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackUrl($voiceStatusCallbackUrl) {
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        return $this;
    }

    /**
     * The URL we should call when the domain receives a call.
     *
     * @param string $voiceUrl The URL we should call when receiving a call
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * Whether to allow SIP Endpoints to register with the domain to receive calls. Can be `true` or `false`. `true` allows SIP Endpoints to register with the domain to receive calls, `false` does not.
     *
     * @param bool $sipRegistration Whether SIP registration is allowed
     * @return $this Fluent Builder
     */
    public function setSipRegistration($sipRegistration) {
        $this->options['sipRegistration'] = $sipRegistration;
        return $this;
    }

    /**
     * The unique address you reserve on Twilio to which you route your SIP traffic. Domain names can contain letters, digits, and "-".
     *
     * @param string $domainName The unique address on Twilio to route SIP traffic
     * @return $this Fluent Builder
     */
    public function setDomainName($domainName) {
        $this->options['domainName'] = $domainName;
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
        return '[Twilio.Api.V2010.UpdateDomainOptions ' . implode(' ', $options) . ']';
    }
}