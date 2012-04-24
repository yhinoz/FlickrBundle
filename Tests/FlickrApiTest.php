<?php

namespace Hnsta\FlickrBundle\Tests;

use Hnsta\FlickrBundle\FlickrApi;

class FlickrApiTest extends \PHPUnit_Framework_TestCase
{
    public function testNew()
    {
        $api = new FlickrApi(new WrapCurl(), 'hogehoge', 'fugafuga');
        $this->assertInstanceOf('Hnsta\FlickrBundle\FlickrApi', $api);
    }

    public function testGetUserId()
    {
        $api = new FlickrApi(new WrapCurl(), 'hogehoge', 'fugafuga');
        $this->assertEquals('hogehoge', $api->getUserId());
    }

    public function testGetApiKey()
    {
        $api = new FlickrApi(new WrapCurl(), 'hogehoge', 'fugafuga');
        $this->assertEquals('fugafuga', $api->getApiKey());
    }
}

class WrapCurl
{
}
