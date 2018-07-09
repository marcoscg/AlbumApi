<?php

namespace Album\V1\Rest\Album;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\DbSelect;

class AlbumDbTableGateway extends DbSelect
{
    
    /**
     * 
     * @param AbstractTableGateway $tableGateway
     * @param unknown $where
     * @param unknown $order
     * @param unknown $group
     * @param unknown $having
     */    
    public function __construct(
        AbstractTableGateway $tableGateway,
        $where = null,
        $order = null,
        $group = null,
        $having = null
        ) {
            $sql    = $tableGateway->getSql();
            
            $select = $sql->select();
            
            $select = $tableGateway->getJoin($select);
            
            if ($where) {
                $select->where($where);
            }
            if ($order) {
                $select->order($order);
            }
            if ($group) {
                $select->group($group);
            }
            if ($having) {
                $select->having($having);
            }
            
            $resultSetPrototype = $tableGateway->getResultSetPrototype();
            parent::__construct($select, $sql, $resultSetPrototype);
    }
    
}

