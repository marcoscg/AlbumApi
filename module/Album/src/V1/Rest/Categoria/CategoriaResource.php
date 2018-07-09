<?php
namespace Album\V1\Rest\Categoria;

use ZF\Apigility\DbConnectedResource;
use Zend\Paginator\Adapter\DbTableGateway;

class CategoriaResource extends DbConnectedResource
{
    public function fetchAll($data = []) 
    {
        
        $where = isset($data['descricao']) ? 'descricao like "' . $data['descricao'] . '%"' : null;
        
        $adapter = new DbTableGateway($this->table, $where, 'descricao');
        
        return new $this->collectionClass($adapter);
    }
    
}

