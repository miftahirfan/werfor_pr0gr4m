<?php

class Administrasi_IndexController extends Zend_Controller_Action
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
        $form = new Administrasi_Form_PasienDaftar();
        $this->view->form = $form;
        
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('themes/base/jquery-ui.min.css'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/validate/jquery.metadata.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/validate/jquery.validate.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/form/jquery.form.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/ui/jquery.ui.core.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/ui/jquery.ui.widget.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/ui/jquery.ui.effect.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/ui/jquery.ui.effect-fold.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/ui/jquery.ui.datepicker.min.js'));
    }

    public function xhrAction()
    {
        if(!$this->_request->isXmlHttpRequest()):
            $this->_redirect('/install');
        endif;
        $this->_helper->ViewRenderer->setNoRender(true);
        $params = $this->_getAllParams();
    }


}



