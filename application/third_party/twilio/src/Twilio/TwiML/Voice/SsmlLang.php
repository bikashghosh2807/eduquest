<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlLang extends TwiML {
    /**
     * SsmlLang constructor.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array()) {
        parent::__construct('lang', $words, $attributes);
    }

    /**
     * Add Xml:Lang attribute.
     *
     * @param string $xmlLang Specify the language
     * @return static $this.
     */
    public function setXmlLang($xmlLang) {
        return $this->setAttribute('xml:Lang', $xmlLang);
    }
}