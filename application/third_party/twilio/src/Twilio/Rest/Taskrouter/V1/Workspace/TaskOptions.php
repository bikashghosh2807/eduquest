<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class TaskOptions {
    /**
     * @param string $attributes The JSON string that describes the custom
     *                           attributes of the task
     * @param string $assignmentStatus The new status of the task
     * @param string $reason The reason that the Task was canceled or complete
     * @param int $priority The Task's new priority value
     * @param string $taskChannel When MultiTasking is enabled, specify the
     *                            TaskChannel with the task to update
     * @return UpdateTaskOptions Options builder
     */
    public static function update($attributes = Values::NONE, $assignmentStatus = Values::NONE, $reason = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE) {
        return new UpdateTaskOptions($attributes, $assignmentStatus, $reason, $priority, $taskChannel);
    }

    /**
     * @param int $priority The priority value of the Tasks to read
     * @param string $assignmentStatus Returns the list of all Tasks in the
     *                                 Workspace with the specified
     *                                 assignment_status
     * @param string $workflowSid The SID of the Workflow with the Tasks to read
     * @param string $workflowName The friendly name of the Workflow with the Tasks
     *                             to read
     * @param string $taskQueueSid The SID of the TaskQueue with the Tasks to read
     * @param string $taskQueueName The friendly_name of the TaskQueue with the
     *                              Tasks to read
     * @param string $evaluateTaskAttributes The task attributes of the Tasks to
     *                                       read
     * @param string $ordering Controls the order of the Tasks returned
     * @param bool $hasAddons Whether to read Tasks with addons
     * @return ReadTaskOptions Options builder
     */
    public static function read($priority = Values::NONE, $assignmentStatus = Values::NONE, $workflowSid = Values::NONE, $workflowName = Values::NONE, $taskQueueSid = Values::NONE, $taskQueueName = Values::NONE, $evaluateTaskAttributes = Values::NONE, $ordering = Values::NONE, $hasAddons = Values::NONE) {
        return new ReadTaskOptions($priority, $assignmentStatus, $workflowSid, $workflowName, $taskQueueSid, $taskQueueName, $evaluateTaskAttributes, $ordering, $hasAddons);
    }

    /**
     * @param int $timeout The amount of time in seconds the task is allowed to live
     * @param int $priority The priority to assign the new task and override the
     *                      default
     * @param string $taskChannel When MultiTasking is enabled specify the
     *                            TaskChannel by passing either its unique_name or
     *                            SID
     * @param string $workflowSid The SID of the Workflow that you would like to
     *                            handle routing for the new Task
     * @param string $attributes A URL-encoded JSON string describing the
     *                           attributes of the task
     * @return CreateTaskOptions Options builder
     */
    public static function create($timeout = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE, $workflowSid = Values::NONE, $attributes = Values::NONE) {
        return new CreateTaskOptions($timeout, $priority, $taskChannel, $workflowSid, $attributes);
    }
}

class UpdateTaskOptions extends Options {
    /**
     * @param string $attributes The JSON string that describes the custom
     *                           attributes of the task
     * @param string $assignmentStatus The new status of the task
     * @param string $reason The reason that the Task was canceled or complete
     * @param int $priority The Task's new priority value
     * @param string $taskChannel When MultiTasking is enabled, specify the
     *                            TaskChannel with the task to update
     */
    public function __construct($attributes = Values::NONE, $assignmentStatus = Values::NONE, $reason = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE) {
        $this->options['attributes'] = $attributes;
        $this->options['assignmentStatus'] = $assignmentStatus;
        $this->options['reason'] = $reason;
        $this->options['priority'] = $priority;
        $this->options['taskChannel'] = $taskChannel;
    }

    /**
     * The JSON string that describes the custom attributes of the task.
     *
     * @param string $attributes The JSON string that describes the custom
     *                           attributes of the task
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The new status of the task. Can be: `canceled`, to cancel a Task that is currently `pending` or `reserved`; `wrapping`, to move the Task to wrapup state; or `completed`, to move a Task to the completed state.
     *
     * @param string $assignmentStatus The new status of the task
     * @return $this Fluent Builder
     */
    public function setAssignmentStatus($assignmentStatus) {
        $this->options['assignmentStatus'] = $assignmentStatus;
        return $this;
    }

    /**
     * The reason that the Task was canceled or completed. This parameter is required only if the Task is canceled or completed. Setting this value queues the task for deletion and logs the reason.
     *
     * @param string $reason The reason that the Task was canceled or complete
     * @return $this Fluent Builder
     */
    public function setReason($reason) {
        $this->options['reason'] = $reason;
        return $this;
    }

    /**
     * The Task's new priority value. When supplied, the Task takes on the specified priority unless it matches a Workflow Target with a Priority set.
     *
     * @param int $priority The Task's new priority value
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * When MultiTasking is enabled, specify the TaskChannel with the task to update. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     *
     * @param string $taskChannel When MultiTasking is enabled, specify the
     *                            TaskChannel with the task to update
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
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
        return '[Twilio.Taskrouter.V1.UpdateTaskOptions ' . implode(' ', $options) . ']';
    }
}

class ReadTaskOptions extends Options {
    /**
     * @param int $priority The priority value of the Tasks to read
     * @param string $assignmentStatus Returns the list of all Tasks in the
     *                                 Workspace with the specified
     *                                 assignment_status
     * @param string $workflowSid The SID of the Workflow with the Tasks to read
     * @param string $workflowName The friendly name of the Workflow with the Tasks
     *                             to read
     * @param string $taskQueueSid The SID of the TaskQueue with the Tasks to read
     * @param string $taskQueueName The friendly_name of the TaskQueue with the
     *                              Tasks to read
     * @param string $evaluateTaskAttributes The task attributes of the Tasks to
     *                                       read
     * @param string $ordering Controls the order of the Tasks returned
     * @param bool $hasAddons Whether to read Tasks with addons
     */
    public function __construct($priority = Values::NONE, $assignmentStatus = Values::NONE, $workflowSid = Values::NONE, $workflowName = Values::NONE, $taskQueueSid = Values::NONE, $taskQueueName = Values::NONE, $evaluateTaskAttributes = Values::NONE, $ordering = Values::NONE, $hasAddons = Values::NONE) {
        $this->options['priority'] = $priority;
        $this->options['assignmentStatus'] = $assignmentStatus;
        $this->options['workflowSid'] = $workflowSid;
        $this->options['workflowName'] = $workflowName;
        $this->options['taskQueueSid'] = $taskQueueSid;
        $this->options['taskQueueName'] = $taskQueueName;
        $this->options['evaluateTaskAttributes'] = $evaluateTaskAttributes;
        $this->options['ordering'] = $ordering;
        $this->options['hasAddons'] = $hasAddons;
    }

    /**
     * The priority value of the Tasks to read. Returns the list of all Tasks in the Workspace with the specified priority.
     *
     * @param int $priority The priority value of the Tasks to read
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * The `assignment_status` of the Tasks to read. Can be: `pending`, `reserved`, `assigned`, `canceled`, and `completed`. Returns all Tasks in the Workspace with the specified `assignment_status`.
     *
     * @param string $assignmentStatus Returns the list of all Tasks in the
     *                                 Workspace with the specified
     *                                 assignment_status
     * @return $this Fluent Builder
     */
    public function setAssignmentStatus($assignmentStatus) {
        $this->options['assignmentStatus'] = $assignmentStatus;
        return $this;
    }

    /**
     * The SID of the Workflow with the Tasks to read. Returns the Tasks controlled by the Workflow identified by this SID.
     *
     * @param string $workflowSid The SID of the Workflow with the Tasks to read
     * @return $this Fluent Builder
     */
    public function setWorkflowSid($workflowSid) {
        $this->options['workflowSid'] = $workflowSid;
        return $this;
    }

    /**
     * The friendly name of the Workflow with the Tasks to read. Returns the Tasks controlled by the Workflow identified by this friendly name.
     *
     * @param string $workflowName The friendly name of the Workflow with the Tasks
     *                             to read
     * @return $this Fluent Builder
     */
    public function setWorkflowName($workflowName) {
        $this->options['workflowName'] = $workflowName;
        return $this;
    }

    /**
     * The SID of the TaskQueue with the Tasks to read. Returns the Tasks waiting in the TaskQueue identified by this SID.
     *
     * @param string $taskQueueSid The SID of the TaskQueue with the Tasks to read
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid($taskQueueSid) {
        $this->options['taskQueueSid'] = $taskQueueSid;
        return $this;
    }

    /**
     * The `friendly_name` of the TaskQueue with the Tasks to read. Returns the Tasks waiting in the TaskQueue identified by this friendly name.
     *
     * @param string $taskQueueName The friendly_name of the TaskQueue with the
     *                              Tasks to read
     * @return $this Fluent Builder
     */
    public function setTaskQueueName($taskQueueName) {
        $this->options['taskQueueName'] = $taskQueueName;
        return $this;
    }

    /**
     * The attributes of the Tasks to read. Returns the Tasks that match the attributes specified in this parameter.
     *
     * @param string $evaluateTaskAttributes The task attributes of the Tasks to
     *                                       read
     * @return $this Fluent Builder
     */
    public function setEvaluateTaskAttributes($evaluateTaskAttributes) {
        $this->options['evaluateTaskAttributes'] = $evaluateTaskAttributes;
        return $this;
    }

    /**
     * How to order the returned Task resources. y default, Tasks are sorted by ascending DateCreated. This value is specified as: `Attribute:Order`, where `Attribute` can be either `Priority` or `DateCreated` and `Order` can be either `asc` or `desc`. For example, `Priority:desc` returns Tasks ordered in descending order of their Priority. Multiple sort orders can be specified in a comma-separated list such as `Priority:desc,DateCreated:asc`, which returns the Tasks in descending Priority order and ascending DateCreated Order.
     *
     * @param string $ordering Controls the order of the Tasks returned
     * @return $this Fluent Builder
     */
    public function setOrdering($ordering) {
        $this->options['ordering'] = $ordering;
        return $this;
    }

    /**
     * Whether to read Tasks with addons. If `true`, returns only Tasks with addons. If `false`, returns only Tasks without addons.
     *
     * @param bool $hasAddons Whether to read Tasks with addons
     * @return $this Fluent Builder
     */
    public function setHasAddons($hasAddons) {
        $this->options['hasAddons'] = $hasAddons;
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
        return '[Twilio.Taskrouter.V1.ReadTaskOptions ' . implode(' ', $options) . ']';
    }
}

class CreateTaskOptions extends Options {
    /**
     * @param int $timeout The amount of time in seconds the task is allowed to live
     * @param int $priority The priority to assign the new task and override the
     *                      default
     * @param string $taskChannel When MultiTasking is enabled specify the
     *                            TaskChannel by passing either its unique_name or
     *                            SID
     * @param string $workflowSid The SID of the Workflow that you would like to
     *                            handle routing for the new Task
     * @param string $attributes A URL-encoded JSON string describing the
     *                           attributes of the task
     */
    public function __construct($timeout = Values::NONE, $priority = Values::NONE, $taskChannel = Values::NONE, $workflowSid = Values::NONE, $attributes = Values::NONE) {
        $this->options['timeout'] = $timeout;
        $this->options['priority'] = $priority;
        $this->options['taskChannel'] = $taskChannel;
        $this->options['workflowSid'] = $workflowSid;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The amount of time in seconds the new task is allowed to live. Can be up to a maximum of 2 weeks (1,209,600 seconds). The default value is 24 hours (86,400 seconds). On timeout, the `task.canceled` event will fire with description `Task TTL Exceeded`.
     *
     * @param int $timeout The amount of time in seconds the task is allowed to live
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * The priority to assign the new task and override the default. When supplied, the new Task will have this priority unless it matches a Workflow Target with a Priority set. When not supplied, the new Task will have the priority of the matching Workflow Target.
     *
     * @param int $priority The priority to assign the new task and override the
     *                      default
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * When MultiTasking is enabled, specify the TaskChannel by passing either its `unique_name` or `sid`. Default value is `default`.
     *
     * @param string $taskChannel When MultiTasking is enabled specify the
     *                            TaskChannel by passing either its unique_name or
     *                            SID
     * @return $this Fluent Builder
     */
    public function setTaskChannel($taskChannel) {
        $this->options['taskChannel'] = $taskChannel;
        return $this;
    }

    /**
     * The SID of the Workflow that you would like to handle routing for the new Task. If there is only one Workflow defined for the Workspace that you are posting the new task to, this parameter is optional.
     *
     * @param string $workflowSid The SID of the Workflow that you would like to
     *                            handle routing for the new Task
     * @return $this Fluent Builder
     */
    public function setWorkflowSid($workflowSid) {
        $this->options['workflowSid'] = $workflowSid;
        return $this;
    }

    /**
     * A URL-encoded JSON string with the attributes of the new task. This value is passed to the Workflow's `assignment_callback_url` when the Task is assigned to a Worker. For example: `{ "task_type": "call", "twilio_call_sid": "CAxxx", "customer_ticket_number": "12345" }`.
     *
     * @param string $attributes A URL-encoded JSON string describing the
     *                           attributes of the task
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Taskrouter.V1.CreateTaskOptions ' . implode(' ', $options) . ']';
    }
}