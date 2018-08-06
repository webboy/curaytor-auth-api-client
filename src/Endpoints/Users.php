<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 6/4/2018
 * Time: 12:54 PM
 */

namespace Webboy\AuthApiClient\Endpoints;


class Users extends Common
{
    /**
     * Stages constructor.
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        //Set endpoint and entity index
        $this->setEndpoint('users');

        parent::__construct($config);
    }
}