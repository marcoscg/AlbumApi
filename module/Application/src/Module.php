<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Zend\Mvc\MvcEvent;

use ZF\ContentNegotiation\JsonModel;

class Module
{
    
    public function onBootstrap(MvcEvent $e)
    {
        $headers = $e->getResponse()->getHeaders();
        $headers->addHeaderLine('Access-Control-Allow-Origin: *');
        $headers->addHeaderLine('Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, OPTIONS');
        $headers->addHeaderLine('Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept');
        
        //$events = $e->getTarget()->getEventManager();
        //$events->attach('dispatch.error', array($this, 'onDispatchError'), 100);
    }	    
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function onDispatchError($e)
    {
        $error = $e->getError();
        
        if (!$error) {
            return;
        }
       
        $jsonModel = new JsonModel(array(
            'title' => 'Not Found',
            'status' => 404,
            'detail' => 'The requested URL could not be matched by routing.'
        ));
                
        $e->getResponse()->setStatusCode(404);
        $e->setViewModel($jsonModel);
        $e->stopPropagation();
        return $jsonModel;
    }
}
