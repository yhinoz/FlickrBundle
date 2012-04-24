<?php

namespace Hnsta\FlickrBundle\Tests;

use Hnsta\FlickrBundle\FlickrApi;
use Hnsta\FlickrBundle\Http\HttpAdapter;

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

    public function testGetResponse()
    {
        $api = new FlickrApi(new WrapCurl(), 'hogehoge', 'fugafuga');
        $api->callMethod('test', array());
        $this->assertEquals(WrapCurl::RESPONSE, $api->getResponse());
    }
}

class WrapCurl implements HttpAdapter
{
    const RESPONSE = 'foobar';

    public function setUrl($url)
    {
        return $this;
    }

    public function setMethod($httpMethod)
    {
        return $this;
    }

    public function setOptions($options = array())
    {
        return $this;
    }

    public function setQueryData($datas = array())
    {
        return $this;
    }

    public function setPostData($datas = array())
    {
        return $this;
    }

    public function send()
    {
        return $this;
    }

    public function getResponseCode()
    {
    }

    public function getResponseBody()
    {
        return self::RESPONSE;
    }

    public function getResponseHeader()
    {
    }
}
