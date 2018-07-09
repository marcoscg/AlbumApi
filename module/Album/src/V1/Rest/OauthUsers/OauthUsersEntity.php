<?php
namespace Album\V1\Rest\OauthUsers;

use ArrayObject;

class OauthUsersEntity extends ArrayObject
{

    protected $id;  
    protected $username;
    protected $first_name;
    protected $last_name;
    
    
    public function exchangeArray($input)
    {
       $this->id = $input['id'];
       $this->username = $input['username'];
       $this->first_name = $input['first_name'];
       $this->last_name = $input['last_name'];
        
    }

    
    public function getArrayCopy()
    {
        return [
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
    }
}
