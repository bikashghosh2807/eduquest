<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Page;

class WorkersCumulativeStatisticsPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new WorkersCumulativeStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.WorkersCumulativeStatisticsPage]';
    }
}