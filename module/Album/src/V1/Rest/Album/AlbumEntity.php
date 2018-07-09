<?php
namespace Album\V1\Rest\Album;

class AlbumEntity
{
    
    protected $id;
    protected $artista;
    protected $titulo;
    protected $capa;
    protected $categoria_id;
    protected $categoria;
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getCapa()
    {
        return $this->capa;
    }

    /**
     * @return mixed
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $artista
     */
    public function setArtista($artista)
    {
        $this->artista = $artista;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @param mixed $capa
     */
    public function setCapa($capa)
    {
        $this->capa = $capa;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
    
    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    
    
}
