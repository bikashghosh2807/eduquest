<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class WorkspaceCumulativeStatisticsOptions {
    /**
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @param int $minutes Only calculate statistics since this many minutes in the
     *                     past
     * @param \DateTime $startDate Only calculate statistics from on or after this
     *                             date
     * @param string $taskChannel Only calculate cumulative statistics on this
     *                            TaskChannel
     * @param string $splitByWaitTime A comma separated list of values that
     *                                describes the thresholds to calculate
     *                                statistics on
     * @return FetchWorkspaceCumulativeStatisticsOptions Options builder
     */
    public static function fetch($endDate = Values::NONE, $minutes = Values::NONE, $startDate = Values::NONE, $taskChannel = Values::NONE, $splitByWaitTime = Values::NONE) {
        return new FetchWorkspaceCumulativeStatisticsOptions($endDate, $minutes, $startDate, $taskChannel, $splitByWaitTime);
    }
}

class FetchWorkspaceCumulativeStatisticsOptions extends Options {
    /**
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @param int $minutes Only calculate statistics since this many minutes in the
     *                     past
     * @param \DateTime $startDate Only calculate statistics from on or after this
     *                             date
     * @param string $taskChannel Only calculate cumulative statistics on this
     *                            TaskChannel
     * @param string $splitByWaitTime A comma separated list of values that
     *                                describes the thresholds to calculate
     *                                statistics on
     */
    public function __construct($endDate = Values::NONE, $minutes = Values::NONE, $startDate = Values::NONE, $taskChannel = Values::NONE, $splitByWaitTime = Values::NONE) {
        $this->options['endDate'] = $endDate;
        $this->options['minutes'] = $minutes;
        $this->options['startDate'] = $startDate;
        $this->options['taskChannel'] = $taskChannel;
        $this->options['splitByWaitTime'] = $splitByWaitTime;
    }

    /**
     * Only include usage that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     *
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
        return $this;
    }

    /**
     * Only calculate statistics since this many minutes in the past. The default 15 minutes. This is helpful for displaying statistics for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends.
     *
     * @param int $minutes Only calculate statistics since this many minutes in the
     *                     past
     * @return $this Fluent Builder
     */
    public function setMinutes($minutes) {
        $this->options['minutes'] = $minutes;
        return $this;
    }

    /**
     * Only calculate statistics from this date and time and later, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $startDate Only calculate statistics from on or after this
     *                             date
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * Only calculate cumulative statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     *
     * @param string $taskChannel Only calculate cumulative statistics on this
     *                            TaskChannel
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
        return $this;
    }

    /**
     * A comma separated list of values that describes the thresholds, in seconds, to calculate statistics on. For each threshold specified, the number of Tasks canceled and reservations accepted above and below the specified thresholds in seconds are computed. For example, `5,30` would show splits of Tasks that were canceled or accepted before and after 5 seconds and before and after 30 seconds. This can be used to show short abandoned Tasks or Tasks that failed to meet an SLA.
     *
     * @param string $splitByWaitTime A comma separated list of values that
     *                                describes the thresholds to calculate
     *                                statistics on
     * @return $this Fluent Builder
     */
    public function setSplitByWaitTime($splitByWaitTime) {
        $this->options['splitByWaitTime'] = $splitByWaitTime;
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
        return '[Twilio.Taskrouter.V1.FetchWorkspaceCumulativeStatisticsOptions ' . implode(' ', $options) . ']';
    }
}