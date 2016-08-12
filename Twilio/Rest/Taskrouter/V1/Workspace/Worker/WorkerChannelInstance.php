<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string assignedTasks
 * @property string available
 * @property string availableCapacityPercentage
 * @property string configuredCapacity
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string sid
 * @property string taskChannelSid
 * @property string taskChannelUniqueName
 * @property string workerSid
 * @property string workspaceSid
 * @property string links
 * @property string url
 */
class WorkerChannelInstance extends InstanceResource {
    /**
     * Initialize the WorkerChannelInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The workspace_sid
     * @param string $workerSid The worker_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance 
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $workerSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'assignedTasks' => $payload['assigned_tasks'],
            'available' => $payload['available'],
            'availableCapacityPercentage' => $payload['available_capacity_percentage'],
            'configuredCapacity' => $payload['configured_capacity'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'sid' => $payload['sid'],
            'taskChannelSid' => $payload['task_channel_sid'],
            'taskChannelUniqueName' => $payload['task_channel_unique_name'],
            'workerSid' => $payload['worker_sid'],
            'workspaceSid' => $payload['workspace_sid'],
            'links' => $payload['links'],
            'url' => $payload['url'],
        );
        
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
            'workerSid' => $workerSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelContext Context for this WorkerChannelInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new WorkerChannelContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['workerSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a WorkerChannelInstance
     * 
     * @return WorkerChannelInstance Fetched WorkerChannelInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the WorkerChannelInstance
     * 
     * @param array $options Optional Arguments
     * @return WorkerChannelInstance Updated WorkerChannelInstance
     */
    public function update(array $options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Taskrouter.V1.WorkerChannelInstance ' . implode(' ', $context) . ']';
    }
}