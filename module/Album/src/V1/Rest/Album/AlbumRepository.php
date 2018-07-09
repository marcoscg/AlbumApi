<?php
namespace Album\V1\Rest\Album;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Db\Sql\Select;

class AlbumRepository
{

    private $tableGateway;
    private $dbAdapter;

    /**
     * 
     * @param unknown $service
     */
    public function __construct($service)
    {        
        $this->dbAdapter = $service->get('DbAdapter');
        
        $this->tableGateway = new TableGateway('album', $this->dbAdapter);        
    }
    
    
    /**
     * 
     * @param array $params
     * @return \Album\V1\Rest\Album\AlbumCollection
     */
    public function findAll($params = [])
    {
        $where = isset($params['pesquisa']) ? 'artista like "' . $params['pesquisa'] . '%" OR titulo like "' . $params['pesquisa'] . '%"' : null;
        
        $albumDataMapper = new AlbumDataMapper($this->dbAdapter);
        
        $dbTableGateway = new AlbumDbTableGateway($albumDataMapper, $where, 'artista');
        
        return new AlbumCollection($dbTableGateway);
    }  
    
    
    /**
     * 
     */
    public function find($id)
    {
        $albumDataMapper = new AlbumDataMapper($this->dbAdapter);
        
        $resultSet = $albumDataMapper->select(['album.id' => $id]);
        
        return $resultSet->current();
    }
    
    
    /**
     * 
     */
    public function update($id,  $data)
    {
        $resultSet = $this->tableGateway->update($data,['id' => (int)$id]);
        
        return $this->find($id);        
    }
    
    
    /**
     * 
     * @param unknown $data
     * @return unknown
     */
    public function insert($data)
    {
        $this->tableGateway->insert($data);
        
        $id = $this->tableGateway->getLastInsertValue();
        
        return $this->find($id);
    }
    
    
    /**
     * 
     * @param unknown $id
     * @return unknown
     */
    public function delete($id)
    {   
        $resultSet = $this->tableGateway->delete(['id' => (int)$id]);
        
        return ($resultSet > 0);
    }

}