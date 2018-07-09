<?php
namespace Album\V1\Rpc\Dashboard;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class DashboardController extends AbstractActionController
{
    
    private $service;
    
    /**
     *
     * @param unknown $service
     */
    public function __construct($service)
    {
        $this->service = $service;
        
    }
    
    public function dashboardAction()
    {
        return new ViewModel(array(
            'qt_categoria' => $this->qtRegistro('categoria'),
            'qt_album' => $this->qtRegistro('album')
        ));
    }
    
    /**
     *
     * @param unknown $tableGatewayService
     * @return unknown
     */
    public function qtRegistro($tipo) {
        
        if ($tipo == 'album') {
            $sql = 'SELECT COUNT(*) as qt FROM album ';
        } elseif ($tipo == 'categoria') {
            $sql = 'SELECT COUNT(*) as qt FROM categoria ';
        }
        
        $statement = $this->service->getServiceLocator()->get('DbAdapter')->query($sql);
        
        $results = $statement->execute();
        
        $row = $results->current();
        
        return $row['qt'];
    }
}
