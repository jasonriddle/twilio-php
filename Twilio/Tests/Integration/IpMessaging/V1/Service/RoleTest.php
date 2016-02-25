<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\IpMessaging\V1\Service;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class RoleTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->roles("RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        )));
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->roles("RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        )));
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->roles->create("friendlyName", "channel", array('permission'));
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'FriendlyName' => "friendlyName",
            'Type' => "channel",
            'Permission' => array('permission'),
        );
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'post',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Roles',
            null,
            $values
        )));
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->roles->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'get',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Roles'
        )));
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->ipMessaging->v1->services("ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->roles("RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update("friendlyName", array('permission'));
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'FriendlyName' => "friendlyName",
            'Permission' => array('permission'),
        );
        
        $this->assertTrue($this->holodeck->hasRequest(new Request(
            'post',
            'https://ip-messaging.twilio.com/v1/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Roles/RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            null,
            $values
        )));
    }
}