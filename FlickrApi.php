<?php

namespace Hnsta\FlickrBundle;

/**
 * FlickrApi 
 * 
 * @version $Id$
 * @copyright (c)2012 hnsta.
 * @author Yoshiyuki Hino <gyhino@gmail.com> 
 * @license MIT
 */
class FlickrApi
{
    const API_URI = 'http://api.flickr.com/services/rest';

    protected $http;
    protected $user_id;
    protected $api_key;
    protected $response;

    public function __construct($http, $user_id, $api_key)
    {
        $this->http = $http;
        $this->user_id = $user_id;
        $this->api_key = $api_key;
    }

    public function callMethod($method, $params, $options = array())
    {
        try {
            $this->http
                ->setUrl(self::API_URI)
                ->setQueryData(array_merge(array(
                    'method' => $method,
                    'user_id' => $this->getUserId(),
                    'api_key' => $this->getApiKey(),
                ), $params))
                ->send();

            $this->response = $this->http->getResponseBody();
        } catch (HttpException $ex) {
            throw $ex;
        }
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
