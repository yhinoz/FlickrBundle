<?php

namespace Hnsta\FlickrBundle\Tests;

use Hnsta\FlickrBundle\FlickrApi;

class FlickrApiTest extends \PHPUnit_Framework_TestCase
{
    public function testNew()
    {
        $api = new FlickrApi('hogehoge', 'fugafuga');
        $this->assertInstanceOf('Hnsta\FlickrBundle\FlickrApi', $api);
    }

    public function testGetUserId()
    {
        $api = new FlickrApi('hogehoge', 'fugafuga');
        $this->assertEquals('hogehoge', $api->getUserId());
    }

    public function testGetApiKey()
    {
        $api = new FlickrApi('hogehoge', 'fugafuga');
        $this->assertEquals('fugafuga', $api->getApiKey());
    }
}
