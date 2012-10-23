<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author heaven-dragon
 */
class Vx_Controller_Plugin_SimpleAcl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request) 
    {
        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $role = 'public';
        }else{
            $role = $auth->getIdentity()->role;
        }
        
        $acl = new Zend_Acl();
        $acl->addRole(new Zend_Acl_Role('public'))
                ->addRole(new Zend_Acl_Role('admin'), 'public');
        
        $acl->addResource(new Zend_Acl_Resource('default'));
        
        $resource = $request->getModuleName();
        $privilege = $request->getControllerName();
        $acl->deny();
        $acl->allow('public', null, array('index', 'login', 'install', 'error'));        
        $acl->allow('admin');
        
        if(!$acl->isAllowed($role, $resource, $privilege)){
            $request->setModuleName('default')
                    ->setControllerName('login')                    
                    ->setActionName('index')
                    ->setDispatched(true);
        }
        
        if(!$acl->has($resource)){
            throw new Exception($resource . ' was not on the resource list');
        }

       
    }
}

