<?php
namespace Album\V1\Rest\Album;

use Zend\Hydrator\HydratorInterface;

class AlbumMapper extends AlbumEntity implements HydratorInterface 
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Zend\Hydrator\ExtractionInterface::extract()
	 */
	public function extract($object)
	{
	    return [
			'id' => $object->id,
	        'artista' => $object->artista,
	        'titulo' => $object->titulo,
	        'capa' => $object->capa,
	        'categoria_id' => $object->categoria_id
		];
		
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Zend\Hydrator\HydrationInterface::hydrate()
	 */
	public function hydrate(array $data, $object)
	{
	    $object->id = $data['id'];
	    $object->artista = $data['artista'];
	    $object->titulo = $data['titulo'];
	    $object->capa = $data['capa'];
	    $object->categoria_id = $data['categoria_id'];
	    $object->categoria = ['id'  => $data['categoria_id_id'], 'descricao' => $data['categoria_descricao']];
		
		return $object;
	}

}
