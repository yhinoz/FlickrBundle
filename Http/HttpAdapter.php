<?php

namespace Hnsta\FlickrBundle\Http;

interface HttpAdapter
{
    public function setUrl($url);

    public function setMethod($httpMethod);

    public function setOptions($options = array());

    public function setQueryData($datas = array());

    public function setPostData($datas = array());

    public function send();

    public function getResponseCode();

    public function getResponseBody();

    public function getResponseHeader();
}
