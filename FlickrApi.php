<?php

namespace Hnsta\FlickrBundle;

class FlickrApi
{
    protected $user_id;
    protected $api_key;

    public function __construct($user_id, $api_key)
    {
        $this->user_id = $user_id;
        $this->api_key = $api_key;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }
}
