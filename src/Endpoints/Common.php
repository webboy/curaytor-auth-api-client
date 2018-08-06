<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 6/4/2018
 * Time: 12:49 PM
 */

namespace Webboy\AuthApiClient\Endpoints;




use Webboy\AuthApiClient\AuthApiClient;
use Webboy\AuthApiClient\AuthApiResponse;

class Common extends AuthApiClient
{
    /**
     * @var string $endpoint
     */
    protected $endpoint ='';

    /**
     * @var string $entity_index
     */
    protected $entity_index = '';

    public function __construct(array $config = array())
    {
        parent::__construct($config);
    }

    /**
     * @param string $endpoint
     * @return void
     */
    public function setEndpoint($endpoint='')
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param string $entity_index
     * @return void
     */
    public function setEntityIndex($entity_index='')
    {
        $this->entity_index = $entity_index;
    }

    // COMMON API CALLS

    /**
     * @param array $query_params
     * @return bool|mixed|null|AuthApiResponse
     */
    public function index($query_params=array())
    {
        $response = $this->get($this->endpoint,$query_params);

        return $this->respond($response,$this->entity_index);
    }

    /**
     * @param array $data
     * @return bool|mixed|null|AuthApiResponse
     */
    public function create($data=array())
    {
        $response = $this->post($this->endpoint,$data);

        return $this->respond($response);
    }

    /**
     * @param $id
     * @return bool|mixed|null|AuthApiResponse
     */
    public function show($id)
    {
        $response = $this->get($this->endpoint.'/'.$id);

        return $this->respond($response);
    }

    /**
     * @param $id
     * @param array $data
     * @return bool|mixed|null|AuthApiResponse
     */
    public function update($id,$data=array())
    {
        $response = $this->put($this->endpoint.'/'.$id,$data);

        return $this->respond($response);
    }

    /**
     * @param $id
     * @param array $data
     * @return bool|mixed|null|AuthApiResponse
     */
    public  function remove($id,$data=array())
    {
        $response = $this->delete($this->endpoint.'/'.$id,$data);

        return $this->respond($response);
    }
}