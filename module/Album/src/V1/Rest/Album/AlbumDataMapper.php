<?php

namespace Album\V1\Rest\Album;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class AlbumDataMapper extends TableGateway
{

    protected $table = 'album';
    
    /**
     * 
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter) {
        
        $hydrator = new HydratingResultSet(new AlbumMapper(), new AlbumEntity());
        
        parent::__construct($this->table, $adapter, null,  $hydrator, null);
        
    }

    /**
     * @inheritDoc
     */
    protected function executeSelect(Select $select) {
        
        return parent::executeSelect($this->getJoin($select));
        
    }    
    
    /**
     * 
     * @return \Zend\Db\Sql\Select
     */
    public function getJoin(Select $select) {    
    
        return $select->join(
            'categoria',
            'album.categoria_id = categoria.id',
            ['categoria_id_id' => 'id', 'categoria_descricao' => 'descricao']
            );    
    }
   
}

