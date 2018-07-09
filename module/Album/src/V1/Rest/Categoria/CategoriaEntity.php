<?php
namespace Album\V1\Rest\Categoria;

use ArrayObject;

class CategoriaEntity extends ArrayObject
{
    
    public $id;
    public $descricao;
    
    /**
     * 
     * {@inheritDoc}
     * @see ArrayObject::exchangeArray()
     */
    public function exchangeArray(array $data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->descricao = (!empty($data['descricao'])) ? $data['descricao'] : null;        
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see ArrayObject::getArrayCopy()
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'descricao' => $this->descricao
        ];
    }
    
}
