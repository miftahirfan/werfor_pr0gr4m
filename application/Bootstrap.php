<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initModuleLoaders()
     {
            $this->bootstrap('Frontcontroller');

            $fc = $this->getResource('Frontcontroller');
            $modules = $fc->getControllerDirectory();

            foreach ($modules AS $module => $dir) {
                $moduleName = strtolower($module);
                $moduleName = str_replace(array('-', '.'), ' ', $moduleName);
                $moduleName = ucwords($moduleName);
                $moduleName = str_replace(' ', '', $moduleName);

                $loader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => $moduleName,
                    'basePath' => realpath($dir . "/../"),
                ));
            }
        }
        
        protected function _initView()
    {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');

        $view->headTitle('Siramkan')->setSeparator(' - ');
        $view->headMeta()
                ->appendHttpEquiv('Expires', gmdate('D, d M Y H:i:s', time( ) + 10800) . ' GMT')
                ->appendHttpEquiv('Cache-Control', 'must-revalidate')
                ->appendHttpEquiv('Content-Type', 'application/xhtml+xml; charset=utf-8')
                ->setName('description', 'dokter')
                ->setName('keywords', 'pemeriksaan')
                ->setName('robots', 'index, follow');

        $view->headLink()->headLink(array('rel' => 'favicon', 'href'=> '/favicon.ico','type' => 'image/x-icon'), 'PREPEND');

        $view->headLink()->appendStylesheet($view->baseUrl('css/bootstrap.min.css'));
        $view->headLink()->appendStylesheet($view->baseUrl('css/bootstrap-responsive.min.css'));
        $view->headLink()->appendStylesheet($view->baseUrl('css/style.css'));
        
        $view->addHelperPath('ZendX/JQuery/View/Helper', 'ZendX_JQuery_View_Helper');
        $view->addHelperPath('EasyBib/View/Helper', 'EasyBib_View_Helper');
        //$view->addHelperPath('Vx/View/Helper', 'Vx_View_Helper');

        $view->JQuery()->setLocalPath($view->baseUrl('js/jquery-1.8.2.min.js'))->enable();
        
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        return $view;
    }

}

