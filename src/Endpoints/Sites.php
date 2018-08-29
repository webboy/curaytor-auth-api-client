<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 6/4/2018
 * Time: 12:54 PM
 */

namespace Webboy\CuraytorAuthApiClient\Endpoints;


class Sites extends Common
{
    /**
     * Stages constructor.
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        //Set endpoint and entity index
        $this->setEndpoint('sites');

        parent::__construct($config);
    }

    public function move_users($id,$new_id)
    {
        $data['new_site_id'] = $new_id;
        return $this->put($this->endpoint.'/'.$id.'/users',$data);
    }
}