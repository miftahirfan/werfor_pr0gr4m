<?php

/**
 * Password Element
 *
 * @author demo
 */
class Demo_Form_Element_TwitterPassword extends Zend_Form_Element_Password
{
    public function init(){
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')), 
            array('Label', array('class' => 'control-label')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))             
        ));
        
    }
}

