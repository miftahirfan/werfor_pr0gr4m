<?php

class Administrasi_InstallController extends Zend_Controller_Action
{

    public function init()
    {
        parent::init();
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('xhr', 'html')
                            ->initContext();
    }

    public function indexAction()
    {
        //$user = Doctrine_Core::getTable('Administrasi_Model_User')->findAll();
        $user = array();
        if(count($user)):
            $this->_redirect('/');
        else:
            $form = new Administrasi_Form_AdminUser();
            $form->setAction('/install/xhr/do/init-user/format/html');
            $this->view->form = $form;
        endif;
        
        $this->view->headScript()->appendFile($this->view->baseUrl('js/validate/jquery.metadata.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/validate/jquery.validate.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/form/jquery.form.js'));
    }

    public function xhrAction()
    {
        if(!$this->_request->isXmlHttpRequest()):
            $this->_redirect('/install');
        endif;
        $this->_helper->ViewRenderer->setNoRender(true);
        $params = $this->_getAllParams();
        switch($params['do']):
            case 'init-user':
                $params['username'] = trim(strtolower($params['username']));
                $params['namalengkap'] = trim($params['namalengkap']);
                $params['password'] = $params['password'];
                $params['role'] = 'administrator';
                $user = new Administrasi_Model_User();
                $user->fromArray($params);
                $user->save();

                $users = Doctrine_Core::getTable('Administrasi_Model_User')->findAll();
                if(count($users)):
                    echo Zend_Json::encode(array('confirm' => 'Succesfully added'));
                else:
                    echo Zend_Json::encode(array('warning' => 'Failed to install'));
                endif;

            break;
            default:
            break;
        endswitch;
    }

    public function infoAction()
    {
        $this->_helper->layout->disableLayout(true);
        $this->_helper->ViewRenderer->setNoRender(true);
        phpinfo();
    }
}



