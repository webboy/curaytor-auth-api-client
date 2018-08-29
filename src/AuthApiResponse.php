<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 6/4/2018
 * Time: 12:37 PM
 */

namespace Webboy\CuraytorAuthApiClient;


use GuzzleHttp\Psr7\Response;

class AuthApiResponse
{
    /**
     * @var Response $guzzle_response
     */
    protected $guzzle_response;

    /**
     * @var array $response_body
     */
    protected $response_body;

    /**
     * FubResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->guzzle_response = $response;
        $return = @json_decode($response->getBody()->getContents(),true);
        $this->response_body = is_array($return) ? $return : array();
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->guzzle_response->getStatusCode();
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->guzzle_response->getReasonPhrase();
    }

    /**
     * @param $index
     * @return array
     */
    public function getData($index)
    {
        return (!empty($this->response_body[$index]) ? $this->response_body[$index] : array());
    }

    /**
     * @return mixed|null
     */
    public function getMeta()
    {
        return $this->getData('_metadata');
    }

    /**
     * @return mixed|null
     */
    public function getErrorMessage()
    {
        return $this->getData('message');
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->response_body;
    }

    /**
     * @return bool
     */
    public function isSucces()
    {
        $code = $this->guzzle_response->getStatusCode();

        if ($code == 200 || $code == 201)
        {
            return true;
        } else {
            return false;
        }
    }
}