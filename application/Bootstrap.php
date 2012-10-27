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

}

