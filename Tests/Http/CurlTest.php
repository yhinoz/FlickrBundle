<?php

namespace Hnsta\FlickrBudnle\Tests\Http;

use Hnsta\FlickrBundle\Http\HttpAdapter;
use Hnsta\FlickrBundle\Http\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase
{
    public function testNew()
    {
        $curl = new Curl();
        $this->assertInstanceOf('Hnsta\FlickrBundle\Http\Curl', $curl);
    }

    public function testSetUrl_argIsNull()
    {
        $curl = new Curl();
        $this->assertInstanceOf('Hnsta\FlickrBundle\Http\Curl', $curl->setUrl(null));
    }

    public function testSetUrl_argIsEmpty()
    {
        $curl = new Curl();
        $this->assertInstanceOf('Hnsta\FlickrBundle\Http\Curl', $curl->setUrl(''));
    }

    public function testSetUrl_argIsUrl()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setUrl('http://hnsta.com/')
        );
    }

    public function testSetMethod_argIsNull()
    {
        $curl = new Curl();
        $this->assertInstanceOf('Hnsta\FlickrBundle\Http\Curl', $curl->setUrl(null));
    }

    public function testSetMethod_argIsEmpty()
    {
        $curl = new Curl();
        $this->assertInstanceOf('Hnsta\FlickrBundle\Http\Curl', $curl->setUrl(''));
    }

    public function testSetMethod_argIsHttpMethodGet()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setMethod(Curl::HTTP_METHOD_GET)
        );
    }

    public function testSetMethod_argIsHttpMethodPost()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setMethod(Curl::HTTP_METHOD_POST)
        );
    }

    public function testSetMethod_argIsHttpMethodPut()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setMethod(Curl::HTTP_METHOD_PUT)
        );
    }

    public function testSetMethod_argIsHttpMethodDelete()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setMethod(Curl::HTTP_METHOD_DELETE)
        );
    }

    public function testSetOptions_argIsNone()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setOptions()
        );
    }

    public function testSetOptions_argIsNull()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setOptions(null)
        );
    }

    public function testSetOptions_argIsEmpty()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setOptions('')
        );
    }

    public function testSetOptions_argIsNonOptionInArray()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setOptions(array(
            ))
        );
    }

    public function testSetOptions_argIsOneOptionInArray()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setOptions(array(
                CURLOPT_HEADER => false,
            ))
        );
    }

    public function testSetOptions_argIsTwoOptionInArray()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setOptions(array(
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
            ))
        );
    }

    public function testSetOptions_argIsInvalidOptionInArray()
    {
        $this->markTestIncomplete('this test is not yet implemented');
    }

    public function testSetQueryData_argIsNone()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setQueryData()
        );
    }

    public function testSetQueryData_argIsNull()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setQueryData(null)
        );
    }

    public function testSetQueryData_argIsEmpty()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setQueryData('')
        );
    }

    public function testSetQueryData_argIsArray()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setQueryData(array('foo' => 'bar'))
        );
    }

    public function testSetQueryData_argIsString()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setQueryData('foo=bar')
        );
    }

    public function testSetPostData_argIsNone()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setPostData()
        );
    }

    public function testSetPostData_argIsNull()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setPostData(null)
        );
    }

    public function testSetPostData_argIsEmpty()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setPostData('')
        );
    }

    public function testSetPostData_argIsArray()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setPostData(array('foo' => 'bar'))
        );
    }

    public function testSetPostData_argIsString()
    {
        $curl = new Curl();
        $this->assertInstanceOf(
            'Hnsta\FlickrBundle\Http\Curl',
            $curl->setPostData('foo=bar')
        );
    }

    public function testSend()
    {
        $this->markTestIncomplete('this test is not yet implemented');
    }

    public function testSend_urlIsNotSet()
    {
        $this->markTestIncomplete('this test is not yet implemented');
    }
}
