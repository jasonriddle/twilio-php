<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Notify\V1\Service\User;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string serviceSid
 * @property string identity
 * @property string segment
 * @property string url
 */
class SegmentMembershipInstance extends InstanceResource {
    /**
     * Initialize the SegmentMembershipInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The service_sid
     * @param string $identity The identity
     * @param string $segment The segment
     * @return \Twilio\Rest\Notify\V1\Service\User\SegmentMembershipInstance 
     */
    public function __construct(Version $version, array $payload, $serviceSid, $identity, $segment = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'segment' => Values::array_get($payload, 'segment'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'identity' => $identity,
            'segment' => $segment ?: $this->properties['segment'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Notify\V1\Service\User\SegmentMembershipContext Context
     *                                                                      for
     *                                                                      this
     *                                                                      SegmentMembershipInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new SegmentMembershipContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['identity'],
                $this->solution['segment']
            );
        }

        return $this->context;
    }

    /**
     * Deletes the SegmentMembershipInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a SegmentMembershipInstance
     * 
     * @return SegmentMembershipInstance Fetched SegmentMembershipInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
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
        return '[Twilio.Notify.V1.SegmentMembershipInstance ' . implode(' ', $context) . ']';
    }
}