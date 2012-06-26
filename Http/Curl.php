<?php

namespace Hnsta\FlickrBundle\Http;

class Curl implements HttpAdapter
{
    const HTTP_METHOD_GET    = 1;
    const HTTP_METHOD_POST   = 2;
    const HTTP_METHOD_PUT    = 3;
    const HTTP_METHOD_DELETE = 4;
    const TIMEOUT_SEC        = 30;

    protected $resource;

    protected $url;
    protected $httpMethod;
    protected $queryData;
    protected $responseInfo;
    protected $responseHeader;
    protected $responseBody;

    public function __construct($url = '', $httpMethod = self::HTTP_METHOD_GET, $options = array())
    {
        $this->resource = curl_init();
        if (!is_resource($this->resource)) {
            throw new \RuntimeException('curl_init failure');
        }
        $this->setUrl($url);
        $this->setMethod($httpMethod);
        $this->setOptions(array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => self::TIMEOUT_SEC,
        ));
        $this->setOptions($options);
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
        return $this;
    }

    public function setOptions($options = array())
    {
        if (is_array($options)) {
            foreach ($options as $option => $value) {
                if (!curl_setopt($this->resource, $option, $value)) {
                    throw new \LogicException(
                        'curl_setopt failure, '
                        . json_encode(array(
                            $option => $value,
                        ))
                    );
                }
            }
        }
        return $this;
    }

    public function setQueryData($datas = array())
    {
        if (is_array($datas)) {
            $datas = http_build_query($datas);
        }
        $this->queryData = $datas;
        return $this;
    }

    public function setPostData($datas = array())
    {
        if (is_array($datas)) {
            $datas = http_build_query($datas);
        }
        $this->setOptions(array(
            CURLOPT_POSTFIELDS => $datas,
        ));
        return $this;
    }

    public function send()
    {
        $this->_prepareRequest();
        $this->responseBody = curl_exec($this->resource);
        $this->responseInfo = curl_getinfo($this->resource);
        if ($this->responseBody === false) {
            $code    = curl_errno($this->resource);
            $message = curl_error($this->resource);
            throw new \RuntimeException(
                'curl_exec failure, '
                . json_encode(array(
                    'code' => $code,
                    'message' => $message,
                ), $code)
            );
        }
        return $this;
    }

    private function _prepareRequest()
    {
        $options = array();

        switch ($this->httpMethod) {
            case self::HTTP_METHOD_GET:
                $options = array(CURLOPT_HTTPGET => true);
                break;
            case self::HTTP_METHOD_POST:
                $options = array(CURLOPT_POST => true);
                break;
            case self::HTTP_METHOD_PUT:
                $options = array(CURLOPT_PUT => true);
                break;
            case self::HTTP_METHOD_DELETE:
                $options = array(CURLOPT_CUSTOMREQUEST => 'DELETE');
                break;
        }

        if ($this->queryData === null || $this->queryData === "") {
            $options[CURLOPT_URL] = $this->url;
        } else {
            $options[CURLOPT_URL] = $this->url . '?' . $this->queryData;
        }

        $options[CURLOPT_HEADERFUNCTION] = array($this, '_callbackSetResponseHeader');

        return $this->setOptions($options);
    }

    private function _callbackSetResponseHeader($resource, $header)
    {
        if (strpos($header, ': ') !== false) {
            $this->responseHeader .= $header;
        }
        return strlen($header);
    }

    public function getResponseCode()
    {
        if (array_key_exists('http_code', $this->responseInfo)) {
            return $this->responseInfo['http_code'];
        }
        return null;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }

    public function getResponseHeader()
    {
        return $this->responseHeader;
    }
}
