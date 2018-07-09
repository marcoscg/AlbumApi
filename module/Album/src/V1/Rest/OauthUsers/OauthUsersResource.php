<?php
namespace Album\V1\Rest\OauthUsers;

use ZF\Apigility\DbConnectedResource;
use Zend\Crypt\Password\Bcrypt;

class OauthUsersResource extends DbConnectedResource
{

    public function create($data)
    {
        $data = $this->retrieveData($data);
        $data['password'] = $this->getBcrypt($data['password']);        
        $this->table->insert($data);        
        $id = $this->table->getLastInsertValue();        
        return $this->fetch($id);
    }
    
    public function update($id, $data)
    {
        $data = $this->retrieveData($data);
        $data['password'] = $this->getBcrypt($data['password']);
        $this->table->update($data, [$this->identifierName => $id]);
        return $this->fetch($id);
    }
    
    public function getBcrypt($password)
    {
        $bcrypt = new Bcrypt();
        return $bcrypt->create($password);        
    }
}

